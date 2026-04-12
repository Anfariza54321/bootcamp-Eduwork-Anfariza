<x-app-layout>
     @section('title', 'Dashboard Admin')
    <div x-data="{
        openEdit: false,
        editId: '',
        editNama: '',
        editHarga: '',
        editStok: '',
        editMerek: ''
    }" class="bg-black min-h-screen">
        <x-slot name="header">
            <h2
                class="inline-block font-black text-xl uppercase italic tracking-widest bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">
                {{ __('Inventory Management') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                @if (session('error'))
                    <div
                        class="bg-red-500/10 border border-red-500/50 p-4 rounded-lg flex items-center justify-between animate-pulse">
                        <div class="flex items-center">
                            <span class="font-black text-red-500 mr-3">[!]</span>
                            <p class="text-xs font-black uppercase tracking-widest text-red-500">
                                {{ session('error') }}
                            </p>
                        </div>
                        <button onclick="this.parentElement.remove()"
                            class="text-red-500 hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-sm">close</span>
                        </button>
                    </div>
                @endif

                @if (session('success'))
                    <div
                        class="bg-cyan-500/10 border border-cyan-500/50 p-4 rounded-lg flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="font-black text-cyan-500 mr-3">>></span>
                            <p class="text-xs font-black uppercase tracking-widest text-cyan-500">
                                {{ session('success') }}
                            </p>
                        </div>
                        <button onclick="this.parentElement.remove()"
                            class="text-cyan-500 hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-sm">close</span>
                        </button>
                    </div>
                @endif

                <div
                    class="bg-gray-900/50 backdrop-blur-xl border border-purple-500/20 shadow-[0_0_30px_rgba(168,85,247,0.1)] overflow-hidden sm:rounded-2xl mt-4">
                    <div class="p-8">

                        <div class="flex justify-between items-center mb-8">
                            <div>
                                <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Daftar <span
                                        class="text-cyan-400">Produk</span></h2>
                                <p class="text-xs text-gray-500 font-mono italic">Status: <span
                                        class="text-green-500">Authorized Access</span></p>
                            </div>
                            <a href="{{ route('produk.create') }}"
                                class="relative group overflow-hidden bg-transparent border border-cyan-500 px-6 py-2 rounded-lg transition-all duration-300 hover:shadow-[0_0_15px_#06b6d4]">
                                <span
                                    class="relative z-10 text-cyan-400 group-hover:text-black font-bold uppercase text-sm transition-colors duration-300">+
                                    Tambah Produk</span>
                                <div
                                    class="absolute inset-0 bg-cyan-500 translate-y-[101%] group-hover:translate-y-0 transition-transform duration-300">
                                </div>
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full border-separate border-spacing-y-3">
                                <thead>
                                    <tr class="text-cyan-500/70 text-xs uppercase tracking-[0.2em] font-black">
                                        <th class="py-4 px-4 text-left">No</th>
                                        <th class="py-4 px-4 text-left">Visual</th>
                                        <th class="py-4 px-4 text-left">Data_Name</th>
                                        <th class="py-4 px-4 text-left">Brand</th>
                                        <th class="py-4 px-4 text-left">Price</th>
                                        <th class="py-4 px-4 text-center">Unit</th>
                                        <th class="py-4 px-4 text-center">Control</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-300">
                                    @foreach ($produks as $produk)
                                        <tr
                                            class="group bg-gray-800/40 hover:bg-purple-500/10 border border-transparent hover:border-purple-500/50 transition-all duration-300 shadow-sm">
                                            <td
                                                class="py-4 px-4 rounded-l-xl border-y border-l border-white/5 font-mono text-xs">
                                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                            <td class="px-4 py-3">
                                                <div
                                                    class="h-12 w-12 bg-gray-900 border border-white/5 overflow-hidden flex items-center justify-center">
                                                    @if ($produk->gambar && file_exists(public_path('images/' . $produk->gambar)))
                                                        <img src="{{ asset('images/' . $produk->gambar) }}"
                                                            class="h-full w-full object-contain">
                                                    @else
                                                        <span class="text-[8px] text-gray-600">NULL_IMG</span>
                                                    @endif
                                                </div>
                                        
                                            </td>
                                            <td
                                                class="py-4 px-4 border-y border-white/5 font-bold text-white tracking-tight group-hover:text-cyan-400 transition-colors">
                                                {{ $produk->nama }}
                                            </td>
                                            <td
                                                class="py-4 px-4 border-y border-white/5 uppercase text-xs tracking-widest font-semibold text-purple-400">
                                                {{ $produk->merek->nama ?? 'Unknown' }}
                                            </td>
                                            <td
                                                class="py-4 px-4 border-y border-white/5 font-mono font-black text-cyan-300">
                                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                            </td>
                                            <td class="py-4 px-4 border-y border-white/5 text-center">
                                                <span
                                                    class="px-3 py-1 bg-gray-900 rounded-full border border-gray-700 text-xs {{ $produk->stok < 10 ? 'text-red-400 border-red-500/50 shadow-[0_0_10px_rgba(239,68,68,0.2)]' : 'text-green-400' }}">
                                                    {{ $produk->stok }} <span
                                                        class="text-[10px] opacity-50 ml-1 italic">PCS</span>
                                                </span>
                                            </td>
                                            <td
                                                class="py-4 px-4 rounded-r-xl border-y border-r border-white/5 text-center">
                                                <div class="flex justify-center gap-3">
                                                    <button
                                                        @click="openEdit = true; editId = '{{ $produk->id }}'; editNama = '{{ $produk->nama }}'; editHarga = '{{ $produk->harga }}'; editStok = '{{ $produk->stok }}'; editMerek = '{{ $produk->merek_id }}'"
                                                        class="p-2 bg-yellow-500/10 hover:bg-yellow-500 text-yellow-500 hover:text-black rounded-lg transition-all duration-300">
                                                        <span class="material-symbols-outlined text-sm">edit</span>
                                                    </button>
                                                    <form action="{{ route('produk.destroy', $produk->id) }}"
                                                        method="POST">
                                                        @csrf @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Erase this data?')"
                                                            class="p-2 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-lg transition-all duration-300">
                                                            <span
                                                                class="material-symbols-outlined text-sm">delete_forever</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="openEdit" class="fixed inset-0 z-50 flex items-center justify-center p-4 backdrop-blur-md" x-cloak>
            <div class="absolute inset-0 bg-black/80" @click="openEdit = false"></div>
            <div
                class="relative bg-gray-900 border border-cyan-500/50 rounded-2xl shadow-[0_0_50px_rgba(6,182,212,0.2)] max-w-lg w-full p-8 overflow-hidden">
                <div class="absolute top-0 right-0 p-2 opacity-10">
                    <span class="material-symbols-outlined text-6xl text-cyan-400">settings</span>
                </div>

                <h2
                    class="text-2xl font-black text-white uppercase italic tracking-tighter mb-6 border-l-4 border-cyan-500 pl-4">
                    Modify_Data <span class="text-cyan-400">#{{ Auth::user()->id }}</span></h2>

                <form :action="'{{ route('produkAdmin') }}/' + editId" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="space-y-5">
                        <div class="group">
                            <label
                                class="block text-[10px] uppercase tracking-[0.3em] font-black text-cyan-500 mb-1">Product_Label</label>
                            <input type="text" name="nama" x-model="editNama"
                                class="w-full bg-black/50 border-gray-800 focus:border-cyan-500 focus:ring-0 rounded-lg text-gray-200 transition-all font-bold">
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <label
                                    class="block text-[10px] uppercase tracking-[0.3em] font-black text-purple-500 mb-1">Price_Value</label>
                                <input type="number" name="harga" x-model="editHarga"
                                    class="w-full bg-black/50 border-gray-800 focus:border-purple-500 focus:ring-0 rounded-lg text-gray-200 transition-all">
                            </div>
                            <div>
                                <label
                                    class="block text-[10px] uppercase tracking-[0.3em] font-black text-purple-500 mb-1">Stock_Qty</label>
                                <input type="number" name="stok" x-model="editStok"
                                    class="w-full bg-black/50 border-gray-800 focus:border-purple-500 focus:ring-0 rounded-lg text-gray-200 transition-all">
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-[10px] uppercase tracking-[0.3em] font-black text-cyan-500 mb-1">Brand_Core</label>
                            <select name="merek_id" x-model="editMerek"
                                class="w-full bg-black/50 border-gray-800 focus:border-cyan-500 focus:ring-0 rounded-lg text-gray-200">
                                @foreach ($mereks as $merek)
                                    <option value="{{ $merek->id }}" class="bg-gray-900">{{ $merek->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label
                                class="block text-[10px] uppercase tracking-[0.3em] font-black text-gray-500 mb-1">Update_Visual</label>
                            <input type="file" name="gambar"
                                class="w-full text-xs text-gray-500 file:bg-cyan-500/10 file:border-cyan-500/30 file:text-cyan-400 file:rounded-md file:px-4 file:py-1 file:mr-4 hover:file:bg-cyan-500 hover:file:text-black transition-all">
                        </div>
                    </div>

                    <div class="mt-8 flex gap-3">
                        <button type="button" @click="openEdit = false"
                            class="flex-1 px-4 py-2 border border-gray-700 text-gray-500 font-bold uppercase text-xs rounded-lg hover:bg-gray-800 transition-all">Abort</button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-cyan-600 hover:bg-cyan-400 text-black font-black uppercase text-xs rounded-lg shadow-[0_0_20px_rgba(6,182,212,0.3)] transition-all">Save_Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
