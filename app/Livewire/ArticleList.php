<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{
    use withPagination;

    #[Session(key: 'only-published')]
    public $showOnlyPublished = false;

    #[Computed()]
    public function articles()
    {
        $query = Article::query();

        if ($this->showOnlyPublished) {
            $query->where('published', 1);
        }

        return $query->paginate(10, pageName: 'articles-page');
    }

    public function delete(Article $article)
    {
        $article->delete();

        $this->dispatch('published-count:reset-count');
    }

    public function togglePublished($showOnlyPublished)
    {
        $this->showOnlyPublished = $showOnlyPublished;
        $this->resetPage(pageName: 'articles-page');
    }
}
