<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class Dashboard extends AdminComponent
{
    public function render()
    {
        return view('livewire.dashboard');
    }
}
