<?php

namespace App\Livewire;
use App\Models\Setting;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\Layout;

class PersonalSettings extends Component
{
    public $message = '';
    public $selectedLanguage='pl';
    public $selectedTheme='light';

    public function mount()
    {
        $user = auth()->user();
        if ($user && $user->settings) {
            $this->selectedLanguage = $user->settings->language ?? 'pl';
            $this->selectedTheme = $user->settings->theme ?? 'light';
        }
    }

    public function saveSettings()
    {
        $setting = Setting::firstOrNew(['user_id' => auth()->id()]);
        $setting->language = $this->selectedLanguage;
        $setting->theme = $this->selectedTheme;
        $setting->save();

        $this->message = __('Settings saved successfully. Please refresh the page to apply changes.');
    }

    #[Layout('layouts.livewire')]
    public function render()
    {
        return view('livewire.personal-settings');
    }
}
