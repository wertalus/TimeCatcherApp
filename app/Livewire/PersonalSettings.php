<?php

namespace App\Livewire;
use App\Models\Setting;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class PersonalSettings extends Component
{
    public $message = '';
    public $selectedLanguage='pl';
    public $selectedTheme='light';
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
