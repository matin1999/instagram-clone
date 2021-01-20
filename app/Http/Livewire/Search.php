<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $results;

    public function render()
    {
        $users = User::where('user_name', 'like', '%' . $this->search . '%')->with('image')->limit(6)->get();
        $this->results = $users->toArray();
        return view('livewire.search')->with('results', $this->results);

    }
}
