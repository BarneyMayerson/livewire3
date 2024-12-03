<div>
    <form
        wire:submit="changeGreeting()"
    >
        <div class="mt-4">
            <select
                wire:model.fill="greeting"
                class="bg-gray-700 rounded p-4 text-white w-52" 
            >
                <option value="Hello">Hello</option>
                <option value="Hi">Hi</option>
                <option value="Hey">Hey</option>
                <option value="Howdy">Howdy</option>
            </select>
            <input
                wire:model="name"
                type="text" 
                class="bg-gray-700 rounded p-4 ml-2 text-white" 
            >
        </div>
        <div class="mt-1 text-xs text-red-400">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="mt-2">
            <button 
                class="text-white font-medium bg-blue-600 px-4 rounded-md py-2"
            >
                Greet
            </button>
        </div>
    </form>
    @if ($greetingMessage !== '')
    <div class=mt-5>
        {{ $greetingMessage }}
    </div>
    @endif
</div>
