<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Models\Setting;

class NavBar extends Component
{
    public $selectedLanguage;

    public function mount()
    {
        app()->setLocale(auth()->user()->settings->language ?? 'pl');
    }

    public function render()
    {
        return view('livewire.nav-bar');
    }
}
