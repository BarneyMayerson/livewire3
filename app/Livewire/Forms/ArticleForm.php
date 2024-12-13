<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ArticleForm extends Form
{
    use WithFileUploads;

    public ?Article $article;

    #[Locked]
    public $id;

    #[Validate('required|max:250')]
    public $title;

    #[Validate('required')]
    public $content;

    public $published = false;

    public $photo_path = '';

    #[Validate('image|max:2048')]
    public $photo;

    public $notifications = [];

    public $allowNotifications = false;

    public function setArticle(Article $article)
    {
        $this->article = $article;

        $this->id = $article->id;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->photo_path = $article->photo_path;
        $this->published = $article->published;
        $this->notifications = $article->notifications ?? [];
        $this->allowNotifications = count($this->notifications) > 0;
    }

    public function store()
    {
        $this->validate();

        if (! $this->allowNotifications) {
            $this->notifications = [];
        }

        if ($this->photo) {
            $this->photo_path = $this->photo->storePublicly('article_photos', [
                'disk' => 'public',
            ]);
        }

        Article::create($this->only(['title', 'content', 'published', 'notifications', 'photo_path']));

        cache()->forget('published-count');
    }

    public function update()
    {
        $this->validate();

        if (! $this->allowNotifications) {
            $this->notifications = [];
        }

        if ($this->photo) {
            $this->photo_path = $this->photo->storePublicly('article_photos', [
                'disk' => 'public',
            ]);
        }

        $this->article->update($this->only(['title', 'content', 'published', 'notifications', 'photo_path']));

        cache()->forget('published-count');
    }
}
