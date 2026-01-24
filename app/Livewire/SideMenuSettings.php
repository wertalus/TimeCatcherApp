<?php

namespace App\Livewire;

use Livewire\Component;

class SideMenuSettings extends Component
{
    public $componentNumber = 0;

    function showComponent($componentNumber)    
    {
        $this->dispatch('show-component', componentNumber: $componentNumber);
    }

    public function mount()
    {
        app()->setLocale(auth()->user()->settings->language ?? 'pl');
    }   

    public function render()
    {
        return view('livewire.side-menu-settings');
    }
}
