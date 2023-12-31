<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class Search extends Component
{

    public $search;

    public function render()
    {
        return view('livewire.search');
    }

    public function getResultsProperty(){
        return Course::where('title','LIKE', '%' . $this->search . '%')
                    ->take(8)
                    ->where('status',3)
                    ->get();
    }
}
