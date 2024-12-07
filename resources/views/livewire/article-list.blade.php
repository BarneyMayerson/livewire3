<div class="container mx-auto mb-4">
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
                <td class="px-6 py-2 flex justify-center">
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
