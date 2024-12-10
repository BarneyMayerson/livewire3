<div class="container mx-auto">
    <h3 class="text-lg text-gray-200 mb-4">Create Article</h3>
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
        <div class="mb-5">
            <label class="flex items-center">
                <input 
                    type="checkbox" 
                    wire:model.boolean="form.published"
                    name="published"
                    class="mr-2"
                >
                Published
            </label>
        </div>
        <div class="mb-5">
            <div>
                <div class="mb-2">Notification Options</div>
                <div class="flex gap-6 mb-3">
                    <label class="flex items-center">
                        <input type="radio" value="true" class="mr-2"
                               wire:model.boolean="form.allowNotifications"
                        >
                        Yes
                    </label>
                    <label class="flex items-center">
                        <input type="radio" value="false" class="mr-2"
                               wire:model.boolean="form.allowNotifications"
                        >
                        No
                    </label>
                </div>
                <div x-show="$wire.form.allowNotifications">
                    <label class="flex items-center">
                        <input type="checkbox" value="email" class="mr-2"
                               wire:model="form.notifications"
                        >
                        Email
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" value="sms" class="mr-2"
                               wire:model="form.notifications"
                        >
                        SMS
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" value="push" class="mr-2"
                               wire:model="form.notifications"
                        >
                        Push
                    </label>
                </div>
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
