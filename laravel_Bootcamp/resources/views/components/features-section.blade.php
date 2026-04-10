<style>
    /* KONTAINER UTAMA 3D */
    .hover-3d {
        position: relative;
        width: 15rem;
        /* Menjaga ukuran lebar kartu */
        height: 20rem;
        /* Menjaga ukuran tinggi kartu */
        perspective: 1000px;
        /* Hapus pointer-events: none dari sini agar link bisa diklik */
    }

    /* BAGIAN KARTU FISIK */
    .hover-3d figure {
        position: absolute;
        inset: 0;
        /* Mengisi seluruh kontainer .hover-3d */
        margin: 0;
        transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        transform-style: preserve-3d;
        backface-visibility: hidden;
        /* Tambahkan kembali ini untuk keamanan */

        /* Tata Letak Menggunakan FLEXBOX agar tidak numpuk */
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Rata tengah horizontal */
        justify-content: center;
        /* Rata tengah vertikal */
        padding: 2rem;

        /* Perbaikan Latar Belakang agar TIDAK KEPOTONG */
        overflow: visible;
        /* Penting agar elemen 3D menonjol keluar */

        /* Glassmorphism & Cyberpunk Style */
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }

    /* Scanline Efek (Opsional, agar makin Cyberpunk) */
    .hover-3d figure::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 255, 255, 0.03) 50%);
        background-size: 100% 4px;
        pointer-events: none;
        opacity: 0.3;
        z-index: 1;
        /* Pastikan di bawah teks dan ikon */
    }

    /* KONTAINER IKON (Elemen yang menonjol) */
    /* Kita gunakan selector yang lebih spesifik agar tidak bertabrakan dengan grid hover */
    .hover-3d figure>div.icon-box {
        position: relative;
        /* Ganti dari absolute ke relative */
        transform: translateZ(60px);
        /* Efek menonjol keluar */
        transform-style: preserve-3d;
        z-index: 10;
        /* Di atas segalanya */

        /* Tambahkan ini agar Flexbox di figure tidak merusak ukurannya */
        flex-shrink: 0;

        /* Efek Glow */
        filter: drop-shadow(0 0 10px rgba(6, 182, 212, 0.6));

        /* Perbaikan: Hapus penetapan grid hover dari class ini */
        top: auto !important;
        left: auto !important;
        width: 4rem !important;
        /* Gunakan w-16 asli Tailwind */
        height: 4rem !important;
        /* Gunakan h-16 asli Tailwind */
    }

    /* GRID HOVER 3D (TETAP SAMA) */
    /* Kita pastikan target div hover-nya benar */
    .hover-3d>div.hover-grid {
        position: absolute;
        z-index: 5;
        /* Di atas figure, di bawah ikon menonjol */
        width: 33.33%;
        height: 33.33%;
        pointer-events: auto;
        /* Agar bisa menerima hover */
        background: transparent;
        /* Pastikan transparan */
    }

    /* Penempatan Grid Hover (Sama seperti kode aslimu) */
    .hover-3d .hover-grid:nth-child(2) {
        top: 0;
        left: 0;
    }

    .hover-3d .hover-grid:nth-child(3) {
        top: 0;
        left: 33.33%;
    }

    .hover-3d .hover-grid:nth-child(4) {
        top: 0;
        left: 66.66%;
    }

    .hover-3d .hover-grid:nth-child(5) {
        top: 33.33%;
        left: 0;
    }

    .hover-3d .hover-grid:nth-child(6) {
        top: 33.33%;
        left: 66.66%;
    }

    .hover-3d .hover-grid:nth-child(7) {
        top: 66.66%;
        left: 0;
    }

    .hover-3d .hover-grid:nth-child(8) {
        top: 66.66%;
        left: 33.33%;
    }

    .hover-3d .hover-grid:nth-child(9) {
        top: 66.66%;
        left: 66.66%;
    }

    /* Rotasi saat Hover Grid (Diperhalus) */
    .hover-3d .hover-grid:nth-child(2):hover~figure {
        transform: rotateX(15deg) rotateY(-15deg);
    }

    .hover-3d .hover-grid:nth-child(3):hover~figure {
        transform: rotateX(15deg) rotateY(0deg);
    }

    .hover-3d .hover-grid:nth-child(4):hover~figure {
        transform: rotateX(15deg) rotateY(15deg);
    }

    .hover-3d .hover-grid:nth-child(5):hover~figure {
        transform: rotateX(0deg) rotateY(-15deg);
    }

    .hover-3d .hover-grid:nth-child(6):hover~figure {
        transform: rotateX(0deg) rotateY(15deg);
    }

    .hover-3d .hover-grid:nth-child(7):hover~figure {
        transform: rotateX(-15deg) rotateY(-15deg);
    }

    .hover-3d .hover-grid:nth-child(8):hover~figure {
        transform: rotateX(-15deg) rotateY(0deg);
    }

    .hover-3d .hover-grid:nth-child(9):hover~figure {
        transform: rotateX(-15deg) rotateY(15deg);
    }
</style>

<div class="bg-white dark:bg-black">
<div class="max-w-7xl mx-auto px-4 py-20 bg-white dark:bg-black transition-colors duration-300">
    <div class="mb-10 text-center lg:text-left lg:px-10">
        <h2 class="text-xs font-mono font-black tracking-[0.5em] text-purple-600 dark:text-purple-400 uppercase mb-2">
            //_Features_Protocol
        </h2>
        <div class="h-1 w-20 bg-cyan-500 mb-6"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 px-4 justify-items-center">

        <div class="hover-3d">
    <div class="hover-grid"></div>
    <div class="hover-grid"></div>
    <div class="hover-grid"></div>
    <div class="hover-grid"></div>
    <div class="hover-grid"></div>
    <div class="hover-grid"></div>
    <div class="hover-grid"></div>
    <div class="hover-grid"></div>

    <figure class="w-60 h-80 rounded-none bg-slate-50 border-gray-200 dark:bg-gray-950 border-2 dark:border-cyan-500/30 shadow-xl dark:shadow-[0_0_15px_rgba(6,182,212,0.1)] relative">
        
        <div class="icon-box w-16 h-16 bg-gradient-to-br from-cyan-400 to-purple-600 rounded-none flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(6,182,212,0.4)]">
            <span class="material-symbols-outlined text-3xl text-white">
                {{-- Gunakan ikon yang sesuai --}}
                delivery_truck_bolt 
            </span>
        </div>

        <h3 class="text-lg font-black text-gray-900 dark:text-white uppercase italic tracking-tighter relative z-10">
            Express_Delivery
        </h3>

        <p class="text-gray-600 dark:text-gray-400 text-[11px] mt-3 text-center leading-tight font-medium uppercase tracking-tight relative z-10">
            Proses pengiriman yang cepat lintas jaringan.
        </p>
        
        <div class="absolute bottom-2 right-2 text-[8px] font-mono text-cyan-500/50 z-10">
            RE_SYNC_READY
        </div>
    </figure>
</div>

        <div class="hover-3d">
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>

            <figure
                class="w-60 h-80 rounded-none bg-slate-50 border-gray-200 dark:bg-gray-950 border-2 dark:border-cyan-500/30 shadow-xl dark:shadow-[0_0_15px_rgba(6,182,212,0.1)] relative">

                <div
                    class="icon-box w-16 h-16 bg-gradient-to-br from-cyan-400 to-purple-600 rounded-none flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(6,182,212,0.4)]">
                    <span class="material-symbols-outlined text-3xl text-white">
                        {{-- Gunakan ikon yang sesuai --}}
                        verified_user
                    </span>
                </div>

                <h3
                    class="text-lg font-black text-gray-900 dark:text-white uppercase italic tracking-tighter relative z-10">
                    Authentic_Gear
                </h3>

                <p
                    class="text-gray-600 dark:text-gray-400 text-[11px] mt-3 text-center leading-tight font-medium uppercase tracking-tight relative z-10">
                    Garansi 100% data original dari pabrik.
                </p>

                <div class="absolute bottom-2 right-2 text-[8px] font-mono text-cyan-500/50 z-10">
                    RE_SYNC_READY
                </div>
            </figure>
        </div>

        <div class="hover-3d">
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>

            <figure
                class="w-60 h-80 rounded-none bg-slate-50 border-gray-200 dark:bg-gray-950 border-2 dark:border-cyan-500/30 shadow-xl dark:shadow-[0_0_15px_rgba(6,182,212,0.1)] relative">

                <div
                    class="icon-box w-16 h-16 bg-gradient-to-br from-cyan-400 to-purple-600 rounded-none flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(6,182,212,0.4)]">
                    <span class="material-symbols-outlined text-3xl text-white">
                        {{-- Gunakan ikon yang sesuai --}}
                        sync_alt
                    </span>
                </div>

                <h3
                    class="text-lg font-black text-gray-900 dark:text-white uppercase italic tracking-tighter relative z-10">
                    Fast_Exchange
                </h3>

                <p
                    class="text-gray-600 dark:text-gray-400 text-[11px] mt-3 text-center leading-tight font-medium uppercase tracking-tight relative z-10">
                    Proses tukar gear yang cepat lintas jaringan.
                </p>

                <div class="absolute bottom-2 right-2 text-[8px] font-mono text-cyan-500/50 z-10">
                    RE_SYNC_READY
                </div>
            </figure>
        </div>

        <div class="hover-3d">
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>
            <div class="hover-grid"></div>

            <figure
                class="w-60 h-80 rounded-none bg-slate-50 border-gray-200 dark:bg-gray-950 border-2 dark:border-cyan-500/30 shadow-xl dark:shadow-[0_0_15px_rgba(6,182,212,0.1)] relative">

                <div
                    class="icon-box w-16 h-16 bg-gradient-to-br from-cyan-400 to-purple-600 rounded-none flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(6,182,212,0.4)]">
                    <span class="material-symbols-outlined text-3xl text-white">
                        {{-- Gunakan ikon yang sesuai --}}
                        rocket_launch
                    </span>
                </div>

                <h3
                    class="text-lg font-black text-gray-900 dark:text-white uppercase italic tracking-tighter relative z-10">
                    Early_access
                </h3>

                <p
                    class="text-gray-600 dark:text-gray-400 text-[11px] mt-3 text-center leading-tight font-medium uppercase tracking-tight relative z-10">
                    Akses awal ke koleksi terbaru dan penawaran eksklusif.
                </p>

                <div class="absolute bottom-2 right-2 text-[8px] font-mono text-cyan-500/50 z-10">
                    RE_SYNC_READY
                </div>
            </figure>
        </div>

    </div>
</div>
</div>
