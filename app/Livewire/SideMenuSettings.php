<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class SideMenuSettings extends Component
{
    #[Layout('layouts.livewire')]
    public function render()
    {
        return view('livewire.side-menu-settings');
    }
}
