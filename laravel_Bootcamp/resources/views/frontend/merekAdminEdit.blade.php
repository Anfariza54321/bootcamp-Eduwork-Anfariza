<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                <h2 class="text-xl font-bold mb-6 text-gray-900 dark:text-gray-100">Edit Merek</h2>
                
                <form action="{{ route('merek.update', $merek->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Merek</label>
                        <input type="text" name="nama" value="{{ old('nama', $merek->nama) }}"
                               class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500" required>
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('merekAdmin') }}" class="bg-gray-500 text-white px-4 py-2 rounded text-sm">Batal</a>
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm shadow-md">Update Merek</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>