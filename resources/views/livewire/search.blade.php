<div>
    <form>
        <div class="mt-4">
            <input
                wire:model.live.debounce="searchText"
                type="text" 
                class="bg-gray-700 w-full rounded p-4 text-white" 
                placeholder="{{ $placeholder }}"
            >
        </div>
    </form>
    @if (!empty($searchText))
        <div wire:transition.scale>
            <livewire:search-results :results="$results">  
        </div>
    @endif
</div>

