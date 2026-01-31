<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class PasswordChange extends Component
{

    #[Validate('required')]
    public $oldPassword;

    #[Validate('required|min:8')]
    public $newPassword;

    #[Validate('required|same:newPassword')]
    public $confirmPassword;
    
    public $message;
    public $selectedLanguage;

    public function mount()
    {
        $this->oldPassword = '';
        $this->newPassword = '';
        $this->confirmPassword = '';
        $this->message = '';
    }

    public function changePassword()
    {
        $this->validate();

        // Here you would typically check the old password and update to the new password.
        // For demonstration, we'll just set a success message.

        $hashedPassword = auth()->user()->password;
        if(password_verify($this->oldPassword, $hashedPassword)) {
            // Update password logic here
            $user = auth()->user();
            $user->password = bcrypt($this->newPassword);
            $user->save();
            $this->message = __('Password changed successfully!');
        } else {
            $this->message = __('Old password is incorrect.');
            return;
        }
        // Refresh the whole page to clear inputs
        $this->reset();
    }

    public function render()
    {
        return view('livewire.password-change');
    }
}
