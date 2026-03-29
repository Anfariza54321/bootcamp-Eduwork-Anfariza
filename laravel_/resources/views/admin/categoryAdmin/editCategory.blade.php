{{-- HAPUS x-app-layout, LANGSUNG PAKAI x-modal --}}
<x-modal name="edit-category-{{ $category->id }}" focusable>
    <form method="POST" action="{{ route('category.update', $category->id) }}" class="p-6">
        @csrf
        @method('PATCH')
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Edit Kategori</h2>
        <div class="mt-6">
            <x-input-label for="nama" value="Nama Merek" />
            <x-text-input name="nama" type="text" class="mt-1 block w-full" value="{{ $category->nama }}" required />
            <x-input-label for="slug" value="slug" />
            <x-text-input name="slug" type="text" class="mt-1 block w-full" value="{{ $category->slug }}" required />
            <x-input-label for="jumlah" value="jumlah" />
            <x-text-input name="jumlah" type="text" class="mt-1 block w-full" value="{{ $category->jumlah }}" required />
        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">Batal</x-secondary-button>
            <x-primary-button class="ms-3">UPDATE KATEGORI</x-primary-button>
        </div>
    </form>
</x-modal>