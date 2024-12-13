<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Edit article')]
class EditArticle extends AdminComponent
{
    use WithFileUploads;

    public ArticleForm $form;

    public function mount(Article $article)
    {
        $this->form->setArticle($article);
    }

    public function downloadPhoto()
    {
        return response()->download(
            Storage::disk('public')->path($this->form->photo_path),
        );
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
