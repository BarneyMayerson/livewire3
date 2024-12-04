<div>
    <form>
        <div class="mt-4">
            <input
                wire:model.live.debounce="searchText"
                type="text" 
                class="bg-gray-700 w-3/4 rounded p-4 text-white" 
                placeholder="type something to search"
            >
            <button
                wire:click.prevent="clear()"
                type="button"
                {{ empty($searchText) ? 'disabled' : '' }} 
                class="font-medium text-white bg-blue-600 rounded-md p-4 disabled:bg-blue-400"
            >
                Clear
            </button>
        </div>
    </form>
    @if ($results)
        <div class="mt-8">
            @foreach ($results as $result)
                <div class="pt-2">
                <a href="/articles/{{$result->id}}">{{$result->title}}</a>
                </div>
            @endforeach
        </div>    
    @endif
</div>

