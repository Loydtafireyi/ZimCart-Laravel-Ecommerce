<?php

namespace App\Http\Livewire;

use App\SystemSetting;
use Livewire\Component;

class FooterDetail extends Component
{
    public function render()
    {
    	$systemDetail = SystemSetting::first();

        return view('livewire.footer-detail', compact('systemDetail'));
    }
}
