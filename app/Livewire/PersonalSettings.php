<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Models\Setting;

class PersonalSettings extends Component
{
    public $selectedLanguage,$message='',$selectedTheme='';

    public function mount()
    {
        $setting = Setting::where('user_id', auth()->id())->first();
        if ($setting) {
            $this->selectedLanguage = $setting->language ?? 'pl';
            $this->selectedTheme = $setting->theme ?? 'light';
        } else {
            $this->selectedLanguage = 'pl';
            $this->selectedTheme = 'light';
        }
        app()->setLocale(auth()->user()->settings->language ?? 'pl');
    }

    public function saveSettings()
    {
        $setting = Setting::firstOrNew(['user_id' => auth()->id()]);
        $setting->language = $this->selectedLanguage;
        $setting->theme = $this->selectedTheme;
        $setting->save();

        $this->message = __('Settings saved successfully. Please login again to apply changes.');
    }

    public function render()
    {
        return view('livewire.personal-settings');
    }
}
