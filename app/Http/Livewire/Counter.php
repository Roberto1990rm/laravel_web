<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 0;
    public $logoCount = 0;
    public $isBlinking = false;


    public function counter()
    {
        $this->counter++; // Corrección: utilizar $this->counter en lugar de $this->$counter
    }

    public function incrementCounterAndLogos()
    {
        $this->counter++;
        $this->logoCount++;
        $this->isBlinking = !$this->isBlinking;
    }
    


    public function render()
    {
        return view('livewire.counter');
    }
}
