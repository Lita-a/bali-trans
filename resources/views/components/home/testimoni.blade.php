<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-4 text-gray-900">
            Apa Kata Pelanggan Kami
        </h2>

        <p class="text-center text-gray-600 mb-14 max-w-2xl mx-auto">
            Pengalaman pelanggan yang telah menggunakan layanan kami
        </p>

        <div class="max-w-2xl mx-auto mb-12">
            <form id="testimonialForm" action="{{ route('testimoni.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="user_name" placeholder="Nama Anda" required class="w-full p-4 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none">

                <div class="flex justify-center gap-2 mb-2">
                    @for($i=1; $i<=5; $i++)
                    <svg data-value="{{ $i }}" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 cursor-pointer text-gray-400 hover:text-orange-500 transition transform hover:scale-110" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.974a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.974c.3.921-.755 1.688-1.54 1.118l-3.38-2.455a1 1 0 00-1.175 0l-3.38 2.455c-.784.57-1.838-.197-1.539-1.118l1.286-3.974a1 1 0 00-.364-1.118L2.05 9.401c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.974z"/>
                    </svg>
                    @endfor
                </div>

                <input type="hidden" name="rating" id="rating" value="0">

                <textarea
                    name="message"
                    rows="3"
                    placeholder="Tulis testimoni Anda..."
                    class="w-full p-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none"
                ></textarea>

                <div class="flex justify-end">
                    <x-button type="submit" class="btn-black-orange">Kirim Testimoni</x-button>
                </div>
            </form>
        </div>

        <div class="relative group">
            <div id="testimonial-carousel" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-6">
                @foreach($testimonis as $testimoni)
                <div class="shrink-0 w-80 p-8 rounded-2xl snap-start text-center transition transform hover:-translate-y-1 hover:shadow-2xl"
                     style="background: linear-gradient(145deg, #000000 0%, #1f2937 100%);
                            box-shadow: inset 0 4px 10px rgba(255,255,255,0.05),
                                        0 10px 25px rgba(0,0,0,0.4);">
                    <div class="w-20 h-20 mx-auto mb-4 rounded-full border-4 border-orange-500 flex items-center justify-center bg-black shadow-lg">
                        <span class="text-orange-500 font-bold text-xl">
                            {{ strtoupper(substr($testimoni->user_name, 0, 1)) }}
                        </span>
                    </div>

                    <div class="flex justify-center gap-1 mb-4">
                        @for($i=1; $i<=5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 @if($i <= $testimoni->rating) text-orange-500 @else @endif" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.974a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.974c.3.921-.755 1.688-1.54 1.118l-3.38-2.455a1 1 0 00-1.175 0l-3.38 2.455c-.784.57-1.838-.197-1.539-1.118l1.286-3.974a1 1 0 00-.364-1.118L2.05 9.401c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.974z"/>
                        </svg>
                        @endfor
                    </div>

                    <p class="text-gray-200 mb-4 italic leading-relaxed">“{{ $testimoni->message }}”</p>
                    <h3 class="font-semibold text-orange-500 text-lg">{{ $testimoni->user_name }}</h3>
                    <span class="text-xs text-gray-400">Pelanggan Terverifikasi</span>
                </div>
                @endforeach
            </div>

            <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow-lg transition">‹</button>
            <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow-lg transition">›</button>
        </div>
    </div>

    <div id="toast" class="fixed bottom-6 right-6 bg-red-500 text-white px-4 py-3 rounded-lg shadow-lg opacity-0 transition-opacity duration-300">
        Pilih rating sebelum mengirim testimoni!
    </div>

</section>

<script>
    const stars = document.querySelectorAll('.rating-star');
    const ratingInput = document.getElementById('rating');
    const form = document.getElementById('testimonialForm');
    const toast = document.getElementById('toast');

    stars.forEach((star,index)=>{
        star.addEventListener('click', ()=>{
            ratingInput.value = index+1;
            stars.forEach((s,i)=>{
                if(i <= index){
                    s.classList.remove('text-gray-400');
                    s.classList.add('text-orange-500');
                }else{
                    s.classList.add('text-gray-400');
                    s.classList.remove('text-orange-500');
                }
            });
        });
    });

    form.addEventListener('submit', function(e){
        if(ratingInput.value==0){
            e.preventDefault();
            toast.classList.remove('opacity-0');
            toast.classList.add('opacity-100');
            setTimeout(()=>{ toast.classList.remove('opacity-100'); toast.classList.add('opacity-0'); },2500);
        }
    });

    const carousel = document.getElementById('testimonial-carousel');
    document.getElementById('prevBtn').onclick = () => carousel.scrollBy({ left: -320, behavior: 'smooth' });
    document.getElementById('nextBtn').onclick = () => carousel.scrollBy({ left: 320, behavior: 'smooth' });

    setInterval(()=>{ carousel.scrollBy({ left: 320, behavior: 'smooth' }); },5000);
</script>
