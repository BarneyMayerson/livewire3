<div>
    <div>
        Hello {{ $name }}!
    </div>
    <form
        wire:submit="changeName(document.querySelector('#newName').value)"
    >
        <div class="mt-4">
            <input
                id="newName"
                type="text" 
                class="block bg-gray-700 rounded w-full p-4 text-white" 
            >
        </div>
        <div class="mt-2">
            <button 
                class="text-white font-medium bg-blue-600 px-4 rounded-md py-2"
            >
                Greet
            </button>
        </div>
    </form>
</div>
