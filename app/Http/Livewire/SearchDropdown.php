<?php

namespace App\Http\Livewire;

use App\Product;
use App\SystemSetting;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
    	$searchResults = [];

    	if(strlen($this->search) > 2) {

    		$searchResults = Product::with('category')->where('name', 'Like', '%'.$this->search.'%')->get();
    	}

        $searchResults = collect($searchResults)->take(7);

    	$systemName = SystemSetting::first();

        return view('livewire.search-dropdown', compact('searchResults', 'systemName'));
    }
}
