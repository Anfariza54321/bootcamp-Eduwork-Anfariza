<x-app-layout>
    <div class="py-12 bg-[#050505] min-h-screen transition-colors duration-500">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0a0a0a] p-8 shadow-2xl sm:rounded-lg border dark:border-purple-500/20 relative overflow-hidden">
                
                <div class="absolute top-0 left-0 w-24 h-1 bg-gradient-to-r from-purple-500 to-transparent"></div>
                <div class="absolute bottom-0 right-0 w-24 h-1 bg-gradient-to-l from-cyan-500 to-transparent"></div>

                <h2 class="text-xl font-black mb-8 uppercase italic tracking-widest bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">
                    REGISTER_NEW_BRAND_
                </h2>

                <form action="{{ route('merek.store') }}" method="POST">
                    @csrf
                    <div class="mb-8">
                        <label class="block text-xs font-black uppercase tracking-[0.2em] text-purple-400 mb-3">
                            Brand Identity Name
                        </label>
                        
                        <input type="text" name="nama"
                            class="w-full border-white/10 rounded-md shadow-sm 
                            bg-black/40 text-cyan-50 
                            focus:ring-2 focus:ring-purple-500 focus:border-cyan-400 transition-all 
                            placeholder:text-gray-500 placeholder:italic"
                            placeholder="INPUT_BRAND_DATA..." required>
                        
                        @error('nama')
                            <p class="mt-3 text-[10px] font-black uppercase tracking-widest text-red-500 animate-pulse flex items-center gap-2">
                                <span class="bg-red-500 text-white px-1 rounded-sm">!</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex justify-end items-center gap-6">
                        <a href="{{ route('merekAdmin') }}"
                            class="text-xs font-black uppercase tracking-widest text-gray-500 hover:text-white transition-colors duration-300">
                            [ ABORT_PROCESS ]
                        </a>
                        
                        <button type="submit"
                            class="bg-gradient-to-r from-purple-600 to-cyan-600 hover:from-cyan-500 hover:to-purple-500 
                            text-white px-8 py-2.5 rounded text-xs font-black uppercase tracking-[0.2em] 
                            transition-all duration-500 shadow-[0_0_15px_rgba(168,85,247,0.3)] hover:shadow-[0_0_20px_rgba(34,211,238,0.5)]">
                            COMMIT_DATA_
                        </button>
                    </div>
                </form>
            </div>
            
            <p class="mt-4 text-center text-[10px] font-mono text-gray-700 uppercase tracking-[0.3em]">
                System Status: <span class="text-cyan-500">Authorized_Access</span> // V2.0.26
            </p>
        </div>
    </div>
</x-app-layout>