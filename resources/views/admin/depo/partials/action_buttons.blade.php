<div class="flex items-center space-x-2" x-data="{ open: false }">
    <!-- Edit Button -->
    <a href="{{ route('admin.depo.edit', $row->id) }}" class="text-blue-600 hover:text-blue-800">
        <i class="ri-edit-circle-fill text-xl"></i>
    </a>

    <!-- Delete Button -->
    <button @click="open = true" class="text-red-600 hover:text-red-800 focus:outline-none">
        <i class="ri-delete-bin-6-fill text-xl"></i>
    </button>

    <!-- Modal -->
    <div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
        <div class="bg-white p-6 rounded-md shadow-lg w-full max-w-md">
            <h2 class="text-lg font-bold text-red-600">Confirm Delete</h2>
            <p class="mt-2 text-gray-700">Are you sure you want to delete this depot?</p>

            <div class="mt-4 flex justify-end gap-2">
                <button @click="open = false" class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300">Cancel</button>

                <form method="POST" action="{{ route('admin.depo.destroy', $row->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 text-sm bg-red-600 text-white rounded hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
