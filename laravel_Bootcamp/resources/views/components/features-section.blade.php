<style>
    
    .hover-3d {
        position: relative;
        width: 15rem;
        height: 20rem;
        perspective: 1000px;
    }

    
    .hover-3d figure {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        margin: 0;
        transition: transform 0.5s ease;
        transform-style: preserve-3d;
        pointer-events: none;
        backface-visibility: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .hover-3d figure>div:first-child {
        transform: translateZ(50px);
        transform-style: preserve-3d;
        position: relative;
    }

    .hover-3d div {
        position: absolute;
        z-index: 10;
        width: 33.33%;
        height: 33.33%;
    }

    .hover-3d div:nth-child(2) {
        top: 0;
        left: 0;
    }

    .hover-3d div:nth-child(3) {
        top: 0;
        left: 33.33%;
    }

    .hover-3d div:nth-child(4) {
        top: 0;
        left: 66.66%;
    }

    .hover-3d div:nth-child(5) {
        top: 33.33%;
        left: 0;
    }

    .hover-3d div:nth-child(6) {
        top: 33.33%;
        left: 66.66%;
    }

    .hover-3d div:nth-child(7) {
        top: 66.66%;
        left: 0;
    }

    .hover-3d div:nth-child(8) {
        top: 66.66%;
        left: 33.33%;
    }

    .hover-3d div:nth-child(9) {
        top: 66.66%;
        left: 66.66%;
    }

    .hover-3d div:nth-child(2):hover~figure {
        transform: rotateX(15deg) rotateY(-15deg);
    }

    .hover-3d div:nth-child(3):hover~figure {
        transform: rotateX(15deg) rotateY(0deg);
    }

    .hover-3d div:nth-child(4):hover~figure {
        transform: rotateX(15deg) rotateY(15deg);
    }

    .hover-3d div:nth-child(5):hover~figure {
        transform: rotateX(0deg) rotateY(-15deg);
    }

    .hover-3d div:nth-child(6):hover~figure {
        transform: rotateX(0deg) rotateY(15deg);
    }

    .hover-3d div:nth-child(7):hover~figure {
        transform: rotateX(-15deg) rotateY(-15deg);
    }

    .hover-3d div:nth-child(8):hover~figure {
        transform: rotateX(-15deg) rotateY(0deg);
    }

    .hover-3d div:nth-child(9):hover~figure {
        transform: rotateX(-15deg) rotateY(15deg);
    }
</style>

<div class="max-w-7xl mx-auto px-10 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 px-10 py-10 justify-items-center">
        <div class="hover-3d">

            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>

            <figure
                class="w-60 h-80 rounded-2xl bg-white border-purple-100 hover:border-purple-300 dark:bg-slate-950 border dark:border-fuchsia-500/30 shadow-[0_10px_30px_rgba(168,85,247,0.1)] dark:shadow-[0_0_20px_rgba(192,38,211,0.2)]">

                <div
                    class="w-16 h-16 bg-linear-to-br from-cyan-500 to-fuchsia-600 text-white rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-4xl!">
                        delivery_truck_bolt
                    </span>
                </div>

                <h3 class="text-xl font-bold text-slate-800 dark:text-cyan-400 text-center leading-tight">
                    Express Shipping
                </h3>

                <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 text-center">
                    Layanan pengiriman prioritas agar sepatu impianmu sampai lebih cepat.
                </p>

            </figure>
        </div>

        <div class="hover-3d">

            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>

            <figure
                class="w-60 h-80 rounded-2xl bg-white border-purple-100 hover:border-purple-300 dark:bg-slate-950 border dark:border-fuchsia-500/30 shadow-[0_10px_30px_rgba(168,85,247,0.1)] dark:shadow-[0_0_20px_rgba(192,38,211,0.2)]">

                <div
                    class="w-16 h-16 bg-linear-to-br from-cyan-500 to-fuchsia-600 text-white rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined">
                        verified_user
                    </span>
                </div>

                <h3 class="text-xl font-bold text-slate-800 dark:text-cyan-400 text-center leading-tight">
                    Authentic Only
                </h3>

                <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 text-center">
                    Kami hanya menjual sepatu original, jadi kamu bisa belanja dengan tenang tanpa khawatir.
                </p>

            </figure>
        </div>

        <div class="hover-3d">

            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>

            <figure
                class="w-60 h-80 rounded-2xl bg-white border-purple-100 hover:border-purple-300 dark:bg-slate-950 border dark:border-fuchsia-500/30 shadow-[0_10px_30px_rgba(168,85,247,0.1)] dark:shadow-[0_0_20px_rgba(192,38,211,0.2)]">

                <div
                    class="w-16 h-16 bg-linear-to-br from-cyan-500 to-fuchsia-600 text-white rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined">
                        keyboard_arrow_right
                    </span>
                </div>

                <h3 class="text-xl font-bold text-slate-800 dark:text-cyan-400 text-center leading-tight">
                    Simple Exchange
                </h3>

                <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 text-center">
                    Proses tukar barang yang mudah dan cepat jika sepatu yang kamu terima tidak sesuai dengan pesanan.
                </p>

            </figure>
        </div>

        <div class="hover-3d">

            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>


            <figure
                class="w-60 h-80 rounded-2xl bg-white border-purple-100 hover:border-purple-300 dark:bg-slate-950 border dark:border-fuchsia-500/30 shadow-[0_10px_30px_rgba(168,85,247,0.1)] dark:shadow-[0_0_20px_rgba(192,38,211,0.2)]">

                <div
                    class="w-16 h-16 bg-linear-to-br from-cyan-500 to-fuchsia-600 text-white rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined">
                        rocket_launch
                    </span>
                </div>

                <h3 class="text-xl font-bold text-slate-800 dark:text-cyan-400 text-center leading-tight">
                    Exclusive Drops
                </h3>

                <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 text-center">
                    Dapatkan akses eksklusif ke rilis sepatu terbaru dan langka sebelum tersedia untuk umum.
                </p>

            </figure>
        </div>
    </div>
</div>
