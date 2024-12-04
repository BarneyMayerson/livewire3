<?php

namespace App\Livewire;

use App\Models\Greeting;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Greeter extends Component
{
    #[Validate('required|min:2')]
    public string $name = '';

    public string $greeting = '';

    public Collection $greetings;

    public string $greetingMessage = '';

    public function changeGreeting()
    {
        $this->reset('greetingMessage');
        $this->validate();
        $this->greetingMessage = "{$this->greeting}, {$this->name}!";
    }

    public function mount()
    {
        $this->greetings = Greeting::all();
    }

    public function render()
    {
        return view('livewire.greeter');
    }
}
