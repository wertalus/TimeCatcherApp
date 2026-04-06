<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use App\Models\Setting;
class Settings extends Component
{
    public $selectedLanguage;

    public $value = 0;

    public function mount()
    {
        $setting = Setting::where('user_id', auth()->id())->first();
        $this->selectedLanguage = $setting ? $setting->language : 'en';
        app()->setLocale($this->selectedLanguage);
    }

    #[Layout('layouts.livewire')]
    public function render()
    {
        return view('livewire.settings');
    }
}
