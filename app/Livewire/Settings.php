<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
class Settings extends Component
{
    public $value = 0;
    #[On('show-component')]
    function MenuItem($componentNumber){     
        switch ($componentNumber) {
            case '1':
                return $this->value = 1;
                break;
            case '2':
                return $this->value = 2;
                break;
            case '3':
                return $this->value = 3;
                break;
            case '4':
                return $this->value = 4;
                break;
            case '5':
                return $this->value = 5;
                break;            
            default:
                return $this->value = 0;
                break;
        }
    }

    public function mount()
    {
        app()->setLocale(auth()->user()->settings->language ?? 'pl');
    }

    #[Layout('layouts.livewire')]
    public function render()
    {
        return view('livewire.settings');
    }
}
