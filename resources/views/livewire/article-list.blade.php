<div class="container mx-auto">
    <div class="mb-6">
        <a 
            href="/dashboard/articles/create" 
            class="text-gray-200 bg-blue-700 hover:bg-blue-800 px-3 py-2 rounded-sm transition-colors"
            wire:navigate
        >
            Create Article
        </a>
    </div>
    <table class="w-full">
        <thead class="uppercase text-xs text-gray-400 bg-gray-700">
            <tr>
                <th class="px-6 py-2">Title</th>
                <th class="px-6 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr
                wire:key="{{ $article->id }}" 
                class="border-b border-gray-700 bg-gray-800"
            >
                <td class="px-6 py-2">
                    {{ $article->title }}
                </td>
                <td class="px-6 py-2 flex justify-center space-x-2">
                    <a 
                        href="/dashboard/articles/{{ $article->id }}/edit"
                        wire:navigate
                        class="text-gray-200 bg-blue-700 hover:bg-blue-800 transition-colors rounded-sm px-3 py-1"
                    >
                        Edit
                    </a>
                    <button 
                        wire:click="delete({{ $article->id }})"
                        wire:confirm="Are you sure you want to delete this article?"
                        class="text-gray-200 bg-red-700 hover:bg-red-800 transition-colors rounded-sm px-3 py-1"
                    >
                        Delete
                    </button>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
</div>
