<?php

namespace App\Http\Livewire\Admin;

use App\Product;
use Livewire\Component;

class SearchBar extends Component
{
	public $search = '';

    public function render()
    {
    	$searchResults = [];

    	if(strlen($this->search) > 2) {

    		$searchResults = Product::with('category')->where('name', 'Like', '%'.$this->search.'%')->get();
    	}

    	$searchResults = collect($searchResults)->take(7);

        return view('livewire.admin.search-bar', compact('searchResults'));
    }
}
