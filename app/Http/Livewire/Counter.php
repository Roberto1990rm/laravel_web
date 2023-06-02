<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 0;

    public function counter()
    {
        $this->counter++; // Corrección: utilizar $this->counter en lugar de $this->$counter
    }

    public function incrementCounter()
{
    $this->counter++;
}


    public function render()
    {
        return view('livewire.counter');
    }
}
