<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brewery;

class Search extends Component
{
    public $searchQuery;
    public $breweries;

    public function mount()
    {
        $this->searchQuery = '';
        $this->updatedSearchQuery('');
    }

    public function updatedSearchQuery($value)
    {
        $this->breweries = Brewery::where('nombre', 'like', '%' . $this->searchQuery . '%')
            ->orWhere('poblacion', 'like', '%' . $this->searchQuery . '%')
            ->get();
    }

    public function render()
    {
        return view('livewire.search');
    }
}


