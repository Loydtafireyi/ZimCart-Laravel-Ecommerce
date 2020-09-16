<?php

namespace App\Http\Livewire;

use App\SocialLink;
use App\SystemSetting;
use Livewire\Component;

class FooterDetail extends Component
{
    public function render()
    {
    	$systemDetail = SystemSetting::first();

    	$socialLinks = SocialLink::first();

        return view('livewire.footer-detail', compact('systemDetail', 'socialLinks'));
    }
}
