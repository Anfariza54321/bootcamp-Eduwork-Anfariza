<footer class="relative bg-white dark:bg-black pt-16 pb-8 transition-colors duration-500 overflow-hidden border-t-2 dark:border-cyan-500/20">
    <div class="absolute bottom-0 right-0 w-64 h-64 bg-purple-600/10 rounded-full blur-[100px] pointer-events-none hidden dark:block"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mb-12">
            
            <div class="space-y-6">
                <div class="flex items-center gap-3 group">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-cyan-500 rounded-lg blur opacity-0 group-hover:opacity-50 transition duration-500"></div>
                        <img src="{{ asset("images/logo_anfariza'SS.webp") }}" class="relative w-14 h-14 grayscale dark:grayscale-0" alt="Logo" />
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-black dark:text-white tracking-tighter italic uppercase">Anfariza'SS</span>
                        <span class="text-[8px] font-mono text-cyan-600 dark:text-cyan-400 tracking-[0.3em] uppercase leading-none mt-1">//_Network_Official</span>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-xs font-medium uppercase tracking-tight max-w-sm border-l-2 border-purple-500 pl-4">
                    Langkah pasti menuju masa depan yang penuh gaya. Koleksi sepatu eksklusif kami adalah pernyataan jati diri dalam jaringan fashion global.
                </p>
                <div class="flex gap-3 pt-2">
                    @foreach(['facebook', 'instagram', 'twitter', 'github'] as $platform)
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-none border border-gray-200 dark:border-cyan-500/30 text-gray-400 dark:text-cyan-400 hover:bg-cyan-500 hover:text-black dark:hover:shadow-[0_0_15px_#06b6d4] transition-all duration-300">
                        <i class="fab fa-{{ $platform }}"></i>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="space-y-6 lg:pl-10">
                <h4 class="text-[10px] font-black uppercase tracking-[0.4em] text-purple-600 dark:text-purple-400 italic mb-8 flex items-center gap-2">
                    <span class="w-2 h-2 bg-purple-600 rounded-full animate-pulse"></span>
                    Contact_Channels
                </h4>
                <div class="space-y-6">
                    <div class="flex items-center gap-4 group">
                        <div class="text-cyan-600 dark:text-cyan-400 group-hover:scale-110 transition-transform"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <p class="text-[8px] font-mono text-gray-400 uppercase tracking-widest">Location_Sync</p>
                            <p class="text-sm font-bold dark:text-gray-200 uppercase italic">Jakarta, Indonesia</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="text-purple-600 dark:text-purple-400 group-hover:scale-110 transition-transform"><i class="fas fa-envelope"></i></div>
                        <div>
                            <p class="text-[8px] font-mono text-gray-400 uppercase tracking-widest">Data_Transfers</p>
                            <p class="text-sm font-bold dark:text-gray-200">anfarizass@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <h4 class="text-[10px] font-black uppercase tracking-[0.4em] text-purple-600 dark:text-purple-400 italic flex items-center gap-2">
                    <span class="w-2 h-2 bg-cyan-500 rounded-full"></span>
                    System_Links
                </h4>
                <ul class="grid grid-cols-2 gap-4 lg:grid-cols-1">
                    @foreach(['About Us', 'Products', 'Gallery', 'FAQ', 'Privacy Policy'] as $link)
                    <li>
                        <a href="#" class="text-xs font-black text-gray-500 dark:text-gray-400 hover:text-cyan-600 dark:hover:text-cyan-400 hover:pl-2 transition-all duration-300 uppercase tracking-widest flex items-center gap-2">
                            <span class="text-purple-500 text-[10px]">>></span> {{ $link }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <div class="border-t border-gray-100 dark:border-cyan-500/10 pt-8 mt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-[9px] font-mono text-gray-400 uppercase tracking-[0.2em]">
                &copy; {{ date('Y') }} <span class="text-cyan-600 dark:text-cyan-400 font-black">Anfariza'SS</span>. All_Rights_Reserved.
            </p>
            <div class="flex gap-6">
                <p class="text-[8px] font-mono text-gray-500 uppercase tracking-tighter">Status: <span class="text-green-500">System_Online</span></p>
                <p class="text-[8px] font-mono text-gray-500 uppercase tracking-tighter">Latency: <span class="text-cyan-500">24ms</span></p>
            </div>
        </div>
    </div>
</footer>