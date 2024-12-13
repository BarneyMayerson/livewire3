<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Livewire\Attributes\Title;

#[Title('Edit article')]
class EditArticle extends AdminComponent
{
    public ArticleForm $form;

    public function mount(Article $article)
    {
        $this->form->setArticle($article);
    }

    public function save()
    {
        $this->form->update();

        session()->flash('status', 'Article has been updated.');

        $this->redirect(ArticleList::class, navigate: true);
    }

    public function render()
    {
        return view('livewire.edit-article');
    }
}
