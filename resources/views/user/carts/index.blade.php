<x-layout>
    <x-home.hero-bg title="My Cart" />

    <section class="py-20 bg-linear-to-b from-gray-100 via-gray-50 to-gray-100">
        <div class="container mx-auto px-6 space-y-6">

            @if(count($cart))
            <div class="bg-[#E6F7ED] rounded-xl border border-gray-200 shadow p-6">
                <h2 class="text-2xl md:text-3xl font-extrabold mb-6 text-orange-600 drop-shadow-md">
                    Data Penyewa
                </h2>
                <form id="customer-form" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex flex-col">
                        <label class="text-orange-600 font-semibold mb-1">
                            Nama <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="customer_name" placeholder="Masukkan nama"
                               value="{{ old('customer_name') }}"
                               class="w-full px-3 py-2 border-2 border-orange-500 rounded-md bg-white text-black focus:bg-white focus:ring-1 focus:ring-orange-500 focus:outline-none"
                               required>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-orange-600 font-semibold mb-1">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="customer_email" placeholder="Masukkan email"
                               value="{{ old('customer_email') }}"
                               class="w-full px-3 py-2 border-2 border-orange-500 rounded-md bg-white text-black focus:bg-white focus:ring-1 focus:ring-orange-500 focus:outline-none"
                               required>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-orange-600 font-semibold mb-1">
                            No Telepon <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="customer_phone" placeholder="Masukkan nomor telepon"
                               value="{{ old('customer_phone') }}"
                               class="w-full px-3 py-2 border-2 border-orange-500 rounded-md bg-white text-black focus:bg-white focus:ring-1 focus:ring-orange-500 focus:outline-none"
                               required>
                    </div>
                </form>
            </div>
            @endif

            @if(count($cart))
            <div class="flex justify-between items-center">
                <a href="{{ url('/cars') }}" class="btn btn-orange px-6 py-3 rounded-lg shadow">
                    Tambah Mobil Lain
                </a>

                <form id="confirm-form" action="{{ route('cart.storeOrder') }}" method="POST">
                    @csrf
                    <button id="confirm-btn" class="btn btn-orange px-6 py-3 rounded-lg shadow opacity-50 cursor-not-allowed" disabled>
                        Konfirmasi & Bayar
                    </button>
                </form>
            </div>
            @endif

            @if(count($cart))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($cart as $id => $item)
                <div class="bg-[#E6F7ED] rounded-xl border border-gray-200 shadow p-5 cart-item transition-transform duration-200 hover:scale-101"
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
                        <div class="flex-1 flex flex-col">
                            <label class="text-orange-600 font-semibold mb-1">Mulai Sewa</label>
                            <input type="date"
                                   min="{{ now()->format('Y-m-d') }}"
                                   value="{{ old("cart.$id.start_date", $item['start_date']) }}"
                                   class="start-date w-full px-3 py-2 rounded-md border-2 border-orange-500 bg-white text-black focus:bg-white focus:ring-1 focus:ring-orange-500 focus:outline-none">
                        </div>
                        <div class="flex-1 flex flex-col">
                            <label class="text-orange-600 font-semibold mb-1">Akhir Sewa</label>
                            <input type="date"
                                   value="{{ old("cart.$id.end_date", $item['end_date']) }}"
                                   class="end-date w-full px-3 py-2 rounded-md border-2 border-orange-500 bg-white text-black focus:bg-white focus:ring-1 focus:ring-orange-500 focus:outline-none">
                        </div>
                    </div>

                    <label class="flex items-center mt-4 text-sm font-semibold text-black">
                        <input type="checkbox" class="with-driver mr-2"
                               {{ old("cart.$id.with_driver", $item['with_driver']) ? 'checked' : '' }}>
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

            <div class="bg-[#E6F7ED] rounded-xl border border-gray-200 shadow p-6 text-right">
                <h2 class="text-2xl font-bold text-black">
                    Total: Rp <span id="total-cart">{{ number_format($totalPrice) }}</span>
                </h2>
            </div>

            @else
            <div class="flex justify-center items-center min-h-75">
                <div class="bg-[#E6F7ED] rounded-xl border border-gray-200 shadow p-10 text-center max-w-md">
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
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        function isValid() {
            let valid = true
            document.querySelectorAll('.cart-item').forEach(item => {
                const start = item.querySelector('.start-date').value
                const end = item.querySelector('.end-date').value
                if (!start || !end || new Date(end) < new Date(start)) valid = false
            })
            const customerForm = document.getElementById('customer-form');
            if(customerForm){
                ['customer_name','customer_email','customer_phone'].forEach(name => {
                    const field = customerForm.querySelector(`[name="${name}"]`);
                    if(!field || !field.value.trim()) valid = false;
                })
            }
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
                item.querySelector('.price-text').innerText = pricePerDay.toLocaleString('id-ID')
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
        document.querySelectorAll('#customer-form input').forEach(el => el.addEventListener('input', updateConfirm))
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
                const customerForm = document.getElementById('customer-form');
                if (customerForm) {
                    new FormData(customerForm).forEach((v,k) => {
                        const input = document.createElement('input')
                        input.type = 'hidden'
                        input.name = k
                        input.value = v
                        form.appendChild(input)
                    })
                }
            })
        }
    })
    </script>
</x-layout>