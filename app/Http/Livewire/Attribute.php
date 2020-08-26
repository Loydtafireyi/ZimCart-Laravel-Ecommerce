<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Attribute extends Component
{
	public $attributes = [];

	public function increment()
	{
		$this->attributes[] = count($this->attributes)+1;
	}

	public function decrement($index)
	{
		unset($this->attributes[$index]);
	}

    public function render()
    {
        return view('livewire.attribute');
    }
}
