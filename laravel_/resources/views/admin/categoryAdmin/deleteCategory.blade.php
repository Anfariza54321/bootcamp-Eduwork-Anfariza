<x-modal name="confirm-delete-{{ $category->id }}" focusable>
    <form method="POST" action="{{ route('category.destroy', $category->id) }}" class="p-6">
        @csrf
        @method('DELETE')
        <h2 class="text-lg font-medium text-red-600">Konfirmasi Hapus</h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Apakah kamu yakin ingin menghapus kategori <b>{{ $category->nama }}</b>?
        </p>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">Batal</x-secondary-button>
            <x-danger-button class="ms-3">YA, HAPUS SEKARANG</x-danger-button>
        </div>
    </form>
</x-modal>