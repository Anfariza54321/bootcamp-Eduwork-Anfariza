<x-app-layout>
     @section('title', 'Dashboard Admin')
    <div x-data="{ openEdit: false, editId: '', editNama: '' }" class="bg-black min-h-screen">

        <x-slot name="header">
            <h2
                class="font-black text-xl text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-cyan-400 uppercase italic tracking-[0.2em]">
                {{ __('Database') }}
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
                    class="bg-gray-900/50 backdrop-blur-xl border border-cyan-500/20 shadow-[0_0_30px_rgba(6,182,212,0.1)] overflow-hidden sm:rounded-2xl mt-4">
                    <div class="p-8">

                        <div class="flex justify-between items-center mb-8">
                            <div>
                                <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Brand <span
                                        class="text-purple-400">Assets</span></h2>
                                <p class="text-[10px] text-cyan-500/60 font-mono">SECURE_CONNECTION: ACTIVE</p>
                            </div>
                            <a href="{{ route('merek.create') }}"
                                class="relative group overflow-hidden bg-transparent border border-purple-500 px-6 py-2 rounded-lg transition-all duration-300 hover:shadow-[0_0_15px_#a855f7]">
                                <span
                                    class="relative z-10 text-purple-400 group-hover:text-black font-bold uppercase text-sm transition-colors duration-300">+
                                    New_Brand</span>
                                <div
                                    class="absolute inset-0 bg-purple-500 translate-x-[-101%] group-hover:translate-x-0 transition-transform duration-300">
                                </div>
                            </a>
                        </div>

                        <div class="overflow-x-auto mt-4">
                            <table class="min-w-full border-separate border-spacing-y-3">
                                <thead>
                                    <tr class="text-purple-500/70 text-xs uppercase tracking-[0.3em] font-black">
                                        <th class="py-3 px-4 text-left">ID_Node</th>
                                        <th class="py-3 px-4 text-left">Brand_Identity</th>
                                        <th class="py-3 px-4 text-center">Inventory_Load</th>
                                        <th class="py-3 px-4 text-center">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mereks as $merek)
                                        <tr
                                            class="group bg-gray-800/40 hover:bg-cyan-500/10 border border-transparent hover:border-cyan-500/50 transition-all duration-300">
                                            <td
                                                class="py-4 px-4 rounded-l-xl border-y border-l border-white/5 font-mono text-xs text-gray-500 group-hover:text-cyan-400">
                                                [{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}]
                                            </td>

                                            <td class="py-4 px-4 border-y border-white/5">
                                                <span
                                                    class="text-sm font-bold text-white uppercase tracking-wider group-hover:text-purple-400 transition-colors">
                                                    {{ $merek->nama }}
                                                </span>
                                            </td>

                                            <td class="py-4 px-4 border-y border-white/5 text-center">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase bg-cyan-500/10 border border-cyan-500/50 text-cyan-400 shadow-[0_0_10px_rgba(6,182,212,0.2)]">
                                                    {{ $merek->products_count }} Units_Detected
                                                </span>
                                            </td>

                                            <td
                                                class="py-4 px-4 rounded-r-xl border-y border-r border-white/5 text-center">
                                                <div class="flex justify-center gap-3">
                                                    <button type="button"
                                                        @click="openEdit = true; editId = '{{ $merek->id }}'; editNama = '{{ $merek->nama }}'"
                                                        class="p-2 bg-yellow-500/10 hover:bg-yellow-500 text-yellow-500 hover:text-black rounded-lg transition-all duration-300">
                                                        <span class="material-symbols-outlined text-sm">edit</span>
                                                    </button>

                                                    <form action="{{ route('merek.destroy', $merek->id) }}"
                                                        method="POST">
                                                        @csrf @method('DELETE')
                                                        <button type="submit"
                                                            class="p-2 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-lg transition-all duration-300"
                                                            onclick="return confirm('delete this brand?')">
                                                            <span
                                                                class="material-symbols-outlined text-sm">delete</span>
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

            <div class="fixed inset-0 bg-black/80" @click="openEdit = false"></div>

            <div
                class="relative bg-gray-900 border border-purple-500/50 rounded-2xl shadow-[0_0_50px_rgba(168,85,247,0.2)] max-w-md w-full p-8 overflow-hidden">
                <div
                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-500 to-transparent opacity-50">
                </div>

                <h2
                    class="text-xl font-black text-white uppercase italic tracking-tighter mb-6 border-l-4 border-purple-500 pl-4">
                    Modify_Brand <span class="text-purple-400">Node</span>
                </h2>

                <form :action="'{{ url('merekAdmin') }}/' + editId" method="POST">
                    @csrf @method('PUT')

                    <div class="mb-8 group">
                        <label
                            class="block text-[10px] uppercase tracking-[0.3em] font-black text-purple-500 mb-2">Identify_Label</label>
                        <input type="text" name="nama" x-model="editNama"
                            class="w-full bg-black/50 border-gray-800 focus:border-purple-500 focus:ring-0 rounded-lg text-white font-bold transition-all px-4 py-3"
                            required>
                    </div>

                    <div class="flex gap-4">
                        <button type="button" @click="openEdit = false"
                            class="flex-1 px-4 py-2 border border-gray-700 text-gray-500 font-bold uppercase text-xs rounded-lg hover:bg-gray-800 transition-all">
                            Abort
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-purple-600 hover:bg-purple-400 text-black font-black uppercase text-xs rounded-lg shadow-[0_0_20px_rgba(168,85,247,0.3)] transition-all">
                            Sync_Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
