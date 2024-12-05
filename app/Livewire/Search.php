<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Search extends Component
{
    #[Validate('required')]
    public string $searchText = '';

    public $results = [];

    public string $placeholder;

    public function updatedSearchText(string $value)
    {
        $this->reset('results');
        $this->validate();

        $searchTerm = "%{$value}%";

        $this->results = Article::where('title', 'LIKE', $searchTerm)->get();
    }

    public function clear()
    {
        $this->reset(['results', 'searchText']);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
