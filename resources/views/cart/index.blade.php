<x-layout>
<x-home.hero-bg title="My Cart" />

<div class="container mx-auto p-6 space-y-6">

    @if(count($cart))
    <div class="flex justify-between items-center">
        <a href="{{ url('/cars') }}" class="btn btn-orange px-6 py-3 rounded-lg shadow">
            Tambah Mobil Lain
        </a>

        <form id="confirm-form" action="{{ route('cart.confirmation') }}" method="POST">
            @csrf
            <button id="confirm-btn" class="btn btn-orange px-6 py-3 rounded-lg shadow opacity-50 cursor-not-allowed" disabled>
                Konfirmasi & Bayar
            </button>
        </form>
    </div>
    @endif

    @if(count($cart))

    <div class="grid grid-car gap-6 md:grid-cols-2 lg:grid-cols-3">

        @foreach($cart as $id => $item)
        <div class="card cart-item p-5"
            data-id="{{ $id }}"
            data-base-price="{{ $item['price'] }}"
            data-driver-price="{{ $item['driver_price'] }}">

            <img src="{{ $item['image'] }}" class="w-full h-48 object-cover rounded-lg">

            <h2 class="text-xl font-bold mt-3 text-black drop-shadow">
                {{ $item['name'] }}
            </h2>

            <p class="text-orange-600 font-semibold">
                Rp <span class="price-text">0</span> / hari
            </p>

            <div class="flex gap-2 mt-4">
                <input type="date"
                    min="{{ now()->format('Y-m-d') }}"
                    value="{{ $item['start_date'] }}"
                    class="start-date w-1/2 px-3 py-2 rounded-md border-2 border-black bg-white text-black">

                <input type="date"
                    value="{{ $item['end_date'] }}"
                    class="end-date w-1/2 px-3 py-2 rounded-md border-2 border-black bg-white text-black">
            </div>

            <label class="flex items-center mt-4 text-sm font-semibold text-black">
                <input type="checkbox" class="with-driver mr-2"
                    {{ $item['with_driver'] ? 'checked' : '' }}>
                Dengan Driver
            </label>

            <form action="{{ route('cart.remove', $id) }}" method="POST" class="mt-4">
                @csrf
                <button class="btn btn-orange w-full">
                    Hapus
                </button>
            </form>

        </div>
        @endforeach

    </div>

    <div class="card p-6 text-right">
        <h2 class="text-2xl font-bold text-black">
            Total: Rp <span id="total-cart">{{ number_format($totalPrice) }}</span>
        </h2>
    </div>

    @else

    <div class="flex justify-center items-center min-h-75">
        <div class="card p-10 text-center max-w-md">
            <h2 class="text-2xl font-bold text-black mb-3">
                Keranjang Kosong
            </h2>
            <p class="text-black mb-6">
                Silakan pilih mobil terlebih dahulu untuk melanjutkan pemesanan.
            </p>
            <a href="{{ url('/cars') }}" class="btn btn-orange px-6 py-3 rounded-lg">
                Lihat Koleksi Mobil
            </a>
        </div>
    </div>

    @endif

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {

    function isValid() {
        let valid = true
        document.querySelectorAll('.cart-item').forEach(item => {
            const start = item.querySelector('.start-date').value
            const end = item.querySelector('.end-date').value
            if (!start || !end || new Date(end) < new Date(start)) valid = false
        })
        return valid
    }

    function updateConfirm() {
        const btn = document.getElementById('confirm-btn')
        if (!btn) return
        if (isValid()) {
            btn.disabled = false
            btn.classList.remove('opacity-50','cursor-not-allowed')
        } else {
            btn.disabled = true
            btn.classList.add('opacity-50','cursor-not-allowed')
        }
    }

    function updateTotal() {
        let total = 0

        document.querySelectorAll('.cart-item').forEach(item => {
            const base = parseInt(item.dataset.basePrice)
            const driver = parseInt(item.dataset.driverPrice)
            const withDriver = item.querySelector('.with-driver').checked
            const pricePerDay = withDriver ? driver : base

            const start = new Date(item.querySelector('.start-date').value)
            const endInput = item.querySelector('.end-date')

            if (new Date(endInput.value) < start) {
                endInput.value = item.querySelector('.start-date').value
            }

            const end = new Date(endInput.value)
            const days = Math.max(1, Math.ceil((end - start) / 86400000) + 1)

            item.querySelector('.price-text').innerText =
                pricePerDay.toLocaleString('id-ID')

            total += pricePerDay * days
        })

        const totalEl = document.getElementById('total-cart')
        if (totalEl) totalEl.innerText = total.toLocaleString('id-ID')
    }

    document.querySelectorAll('.start-date, .end-date, .with-driver')
        .forEach(el => el.addEventListener('change', () => {
            updateTotal()
            updateConfirm()
        }))

    updateTotal()
    updateConfirm()

    const form = document.getElementById('confirm-form')
    if (form) {
        form.addEventListener('submit', e => {
            if (!isValid()) {
                e.preventDefault()
                return
            }

            form.querySelectorAll('input[name^="cart"]').forEach(el => el.remove())

            document.querySelectorAll('.cart-item').forEach(item => {
                const id = item.dataset.id

                ;['start_date','end_date','with_driver'].forEach(field => {
                    const input = document.createElement('input')
                    input.type = 'hidden'
                    input.name = `cart[${id}][${field}]`

                    if (field === 'with_driver') {
                        input.value = item.querySelector('.with-driver').checked ? 1 : 0
                    } else {
                        input.value = item.querySelector(`.${field.replace('_','-')}`).value
                    }

                    form.appendChild(input)
                })
            })
        })
    }
})
</script>
</x-layout>
