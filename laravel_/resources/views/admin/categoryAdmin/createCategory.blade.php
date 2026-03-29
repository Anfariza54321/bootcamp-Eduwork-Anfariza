<x-modal name="add-category" focusable>
    <form method="POST" action="{{ route('category.store') }}" class="p-6">
        @csrf
        {{-- Method POST tidak perlu @method karena ini data baru --}}
        
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Tambah Kategori Baru
        </h2>
        
        <div class="mt-6">
            <x-input-label for="nama" value="Nama Merek" />
            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" placeholder="Masukkan nama merek..." required />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="jumlah" value="Jumlah (Quantity)" />
            <x-text-input id="jumlah" name="jumlah" type="number" class="mt-1 block w-full" placeholder="0" required />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                Batal
            </x-secondary-button>

            <x-primary-button class="ms-3">
                Simpan Kategori
            </x-primary-button>
        </div>
    </form>
</x-modal>