<div class="container mx-auto">
<h3 class="text-lg text-gray-200 mb-4">Edit Article</h3>
    <form wire:submit="save">
        <div class="mb-5">
            <label class="block" for="article-title">Title</label>
            <input
                id="article-title"
                wire:model="form.title"
                type="text"
                class="p-2 w-full border rounded-md text-white bg-gray-700"
            >
            <div class="mt-1">
                @error('form.title')
                <span class="text-red-600 text-sm">{{ $message }}</span>    
                @enderror
            </div>
        </div>

        <div class="mb-5">
            <label class="block" for="article-content">Content</label>
            <textarea
                id="article-content"
                wire:model="form.content"
                rows="12"
                class="p-2 w-full border rounded-md text-white bg-gray-700"
            ></textarea>
            <div class="mt-1">
                @error('form.content')
                <span class="text-red-600 text-sm">{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div>
            <button
                type="submit"
                class="text-gray-200 bg-blue-700 hover:bg-blue-800 px-3 py-2 rounded-sm transition-colors"
            >
                Save
            </button>
        </div>
    </form>
</div>
