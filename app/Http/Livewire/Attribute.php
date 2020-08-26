<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Attribute extends Component
{
	public $attributes = 0;

	public function increment()
	{
		$this->attributes ++;
	}

    public function render()
    {
        return view('livewire.attribute');
    }
}
