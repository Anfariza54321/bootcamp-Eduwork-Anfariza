<x-app-layout>
    <div class="py-12 bg-[#050505] min-h-screen transition-colors duration-500">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0a0a0a] p-8 shadow-2xl sm:rounded-lg border border-purple-500/20 relative overflow-hidden">
                
                <div class="absolute top-0 right-0 w-16 h-16 bg-gradient-to-br from-purple-600/20 to-transparent"></div>

                <h2 class="text-2xl font-black mb-8 uppercase italic tracking-widest bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">
                    ADD_NEW_GEAR_
                </h2>

                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 text-gray-100">
                        
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest mb-2 text-purple-400">Product Name</label>
                            <input type="text" name="nama"
                                class="w-full border-gray-300 border-white/10 rounded-md shadow-sm 
                                bg-black/40 text-cyan-50 
                                focus:ring-2 focus:ring-purple-500 focus:border-cyan-400 transition-all placeholder:text-gray-500"
                                placeholder="ENTER_PRODUCT_NAME..." required>
                        </div>

                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest mb-2 text-purple-400">Brand / Manufacturer</label>
                            <select name="merek_id"
                                class="w-full border-gray-300 border-white/10 rounded-md shadow-sm 
                                bg-black/40 text-cyan-50 
                                focus:ring-2 focus:ring-purple-500 focus:border-cyan-400 transition-all"
                                required>
                                <option value="" class="bg-gray-900">-- SELECT_BRAND --</option>
                                @foreach ($mereks as $merek)
                                    <option value="{{ $merek->id }}" class="bg-gray-900 text-cyan-400">{{ $merek->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest mb-2 text-purple-400">Description</label>
                            <textarea name="deskripsi" rows="4"
                                class="w-full border-gray-300 border-white/10 rounded-md shadow-sm
                                bg-black/40 text-cyan-50 
                                focus:ring-2 focus:ring-purple-500 focus:border-cyan-400 transition-all placeholder:text-gray-500"
                                placeholder="SYSTEM_LOG: Enter product specs..." required></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest mb-2 text-purple-400">Price (IDR)</label>
                                <input type="number" name="harga"
                                    class="w-full border-gray-300 border-white/10 rounded-md shadow-sm 
                                    bg-black/40 text-cyan-400 font-mono focus:ring-purple-500"
                                    required>
                            </div>
                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest mb-2 text-purple-400">Inventory Stock</label>
                                <input type="number" name="stok"
                                    class="w-full border-gray-300 border-white/10 rounded-md shadow-sm 
                                    bg-black/40 text-cyan-400 font-mono focus:ring-purple-500"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest mb-2 text-purple-400">Visual Resource</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 border-purple-500/30 rounded-md hover:border-cyan-400 transition-colors group">
                                <div class="space-y-1 text-center">
                                    <input type="file" name="gambar" class="cursor-pointer text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:uppercase file:bg-purple-600 file:text-white hover:file:bg-cyan-500 transition-all">
                                    <p class="text-xs text-gray-500 mt-2 italic uppercase">JPG, PNG, WEBP // MAX_2MB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex justify-end gap-4">
                        <a href="{{ route('produkAdmin') }}" 
                           class="px-6 py-2 text-xs font-black uppercase tracking-tighter text-gray-500 hover:text-white transition-colors border border-transparent hover:border-gray-500 rounded">
                            [ CANCEL ]
                        </a>
                        <button type="submit" 
                                class="px-8 py-2 text-xs font-black uppercase tracking-widest text-white bg-gradient-to-r from-purple-600 to-cyan-600 hover:from-cyan-500 hover:to-purple-500 transition-all duration-500 shadow-[0_0_15px_rgba(168,85,247,0.4)] hover:shadow-[0_0_20px_rgba(34,211,238,0.6)] rounded">
                            SAVE_CHANGES_
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>