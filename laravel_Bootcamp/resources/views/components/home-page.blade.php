<section class="bg-white lg:grid lg:h-screen lg:place-content-center dark:bg-gray-900">
    <div
        class="mx-auto w-screen max-w-7xl px-4 py-16 sm:px-6 sm:py-24 md:grid md:grid-cols-2 md:items-center md:gap-4 lg:px-8 lg:py-32">
        <div class="max-w-prose text-left">
            <h1 class=" text-4xl md:text-6xl font-sans font-extrabold tracking-tight text-gray-900 dark:text-white">
                Elevate Your Style, <span class="text-blue-600 drop-shadow-[0_0_8px_rgba(59,130,246,0.8)]">Every Step</span>
            </h1>

            <p class="mt-4 text-base text-pretty text-gray-700 sm:text-lg/relaxed dark:text-gray-200">
                Bukan sekedar alas kaki, tapi pernyataan jati diri. koleksi ekslusif untuk kamu yang berani tampil beda.
                Temukan sepatu yang mencerminkan kepribadianmu, karena setiap langkah adalah kesempatan untuk bersinar.
            </p>

            <div class="mt-4 flex gap-4 sm:mt-6">
                <a class="inline-block rounded border border-indigo-600 bg-indigo-600 px-5 py-3 font-medium text-white shadow-[0_0_20px_rgba(192,38,211,0.2)] transition-colors hover:bg-indigo-700"
                    href="{{ route('products.index') }}">
                    Get Started
                </a>

            </div>
        </div>

        <img src="{{ asset('images/logo_sepatu_home.webp') }}" class="mx-auto w-full max-w-lg h-auto object-contain"
            alt="Neon shoes">

        </img>
    </div>
</section>
