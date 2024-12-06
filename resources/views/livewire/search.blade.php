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
    <livewire:search-results :results="$results" :show="!empty($searchText)">  
</div>

