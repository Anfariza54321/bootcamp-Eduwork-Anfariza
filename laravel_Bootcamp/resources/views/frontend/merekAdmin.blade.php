<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Merek') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-4">Daftar Merek</h2>
                    <a href="{{ route('merekAdmin') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Tambah Merek
                    </a>

                    <div class="overflow-x-auto mt-4">
                        <table class="min-w-full bg-white dark:bg-gray-800 border-collapse">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                                    <th class="py-3 px-4 border-b">No</th>
                                    <th class="py-3 px-4 border-b">Nama Merek</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mereks as $merek)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                        <td class="py-2 px-4 border-b text-sm">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-4 border-b text-sm font-medium">{{ $merek->nama }}</td>
                                        <td class="py-2 px-4 border-b text-center">
                                            <div class="flex justify-center gap-2">
                                                {{-- Pastikan rute .edit sudah ada di web.php --}}
                                                <a href="{{ route('merekAdmin') }}/{{ $merek->id }}/edit"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs shadow-sm">
                                                    Edit
                                                </a>

                                                <form action="{{ route('merekAdmin') }}/{{ $merek->id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs shadow-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus merek ini?')">
                                                        Hapus
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
</x-app-layout>
