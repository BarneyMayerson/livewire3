<div class="container m-auto mb-4">
    <div class="mb-3 flex justify-between items-center">
        <a
            href="/dashboard/articles/create"
            class="text-blue-500 hover:text-blue-700"
            wire:navigate
        >
            Create Article
        </a>
        <div>
            <button 
                @class([
                    'text-gray-200 p-2 hover:bg-blue-800 rounded-sm',
                    'bg-gray-700' => $showOnlyPublished,
                    'bg-blue-700' => !$showOnlyPublished,    
                ])
                wire:click="togglePublished(false)"
            >
                Show All
            </button>
            <button 
                @class([
                    'text-gray-200 p-2 hover:bg-blue-800 rounded-sm',
                    'bg-gray-700' => !$showOnlyPublished,
                    'bg-blue-700' => $showOnlyPublished,    
                ])
                wire:click="togglePublished(true)"
            >
                Show Published (<livewire:published-count placeholder-text="loading" />)
            </button>
        </div>
    </div>
    @if (session('status'))
    <div class="py-2 text-center text-gray-200 bg-green-700">{{ session('status') }}</div>
    @endif
    <div class="my-3">
        {{$this->articles->links()}}
    </div>
    <table class="w-full">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th class="px-6 py-2">Title</th>
                <th class="px-6 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->articles as $article)
            <tr wire:key="{{$article->id}}" class="border-b bg-gray-800 border-gray-700">
                <td class="px-6 py-2">{{$article->title}}</td>
                <td class="px-6 py-2 text-center">
                    <a class="text-gray-200 px-3 py-2 hover:bg-gray-900"
                        href="/dashboard/articles/{{$article->id}}/edit"
                        wire:navigate
                    >
                        Edit
                    </a>
                    <button class="text-gray-200 px-2 py-1 bg-red-700 hover:bg-red-800 rounded-sm"
                        wire:click="delete({{$article->id}})"
                        wire:confirm="Are you sure you want to delete this article?"
                    >
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$this->articles->links()}}
    </div>
</div>
