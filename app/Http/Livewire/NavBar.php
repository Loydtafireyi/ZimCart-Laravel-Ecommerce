<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;

class NavBar extends Component
{
    public function render()
    {
    	$navCategories = Category::all();

        return view('livewire.nav-bar', compact('navCategories'));
    }
}
