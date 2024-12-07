<?php

use App\Livewire\ArticleIndex;
use App\Livewire\ArticleList;
use App\Livewire\Dashboard;
use App\Livewire\ShowArticle;
use Illuminate\Support\Facades\Route;

Route::get('/', ArticleIndex::class);
Route::get('/dashboard', Dashboard::class);
Route::get('/dashboard/articles', ArticleList::class);

Route::get('/articles/{article}', ShowArticle::class);
