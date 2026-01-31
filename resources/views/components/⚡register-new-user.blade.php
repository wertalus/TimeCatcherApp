<?php

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;

new class extends Component
{
    
    #[Validate('required')]
    public $name='';

    #[Validate('required|email|unique:users,email')]
    public $email='';

    #[Validate('required|min:8')]
    public $password='';

    #[Validate('required|same:password')]
    public $password_confirmation='';

    public $message='';

    public function register()
    {
        $this->validate();

        // Create the user
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        // Reset form fields
        $this->reset();

        // Optionally, you can emit an event or set a success message
        $this->message =__('User registered successfully.');
    }
    };
    ?>


<form id="register-new-user" wire:submit.prevent="register" class="container" autocomplete="off">
    <h5 class="text-start">{{__('Register New User')}}</h5>
    <hr>
    @if ($message)
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="name" class="col-form-label">{{__('Name')}}</label>
        </div>
        <div class="col-auto">
            <input type="text" id="name" class="form-control" aria-describedby="passwordHelpInline" wire:model="name" autocomplete="off">
        </div>
        <div>
            @error('name') <span class="error">{{$message}}</span> @enderror 
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="name" class="col-form-label">{{__('Email Address')}}</label>
        </div>
        <div class="col-auto">
            <input type="text" id="email" class="form-control" aria-describedby="passwordHelpInline" wire:model="email" autocomplete="new-email">
        </div>
        <div>
            @error('email') <span class="error">{{$message}}</span> @enderror 
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="password" class="col-form-label">{{__('Password')}}</label>
        </div>
        <div class="col-auto">
            <input type="password" id="password" class="form-control" aria-describedby="passwordHelpInline" wire:model="password" autocomplete="new-password">
        </div>
        <div>
            @error('password') <span class="error">{{$message}}</span> @enderror 
        </div>
    </div>  
    <div class="row g-3 align-items-center">
        <div class="col-2">
            <label for="password-confirmation" class="col-form-label">{{__('Confirm Password')}}</label>
        </div>
        <div class="col-auto">
            <input type="password" id="password-confirmation" class="form-control" aria-describedby="passwordConfirmationHelpInline" wire:model="password_confirmation" autocomplete="off">
        </div>
        <div>
            @error('password_confirmation') <span class="error">{{$message}}</span> @enderror 
        </div>
        <button type="submit" class="btn btn-primary mt-4">{{__('Register')}}</button>
    </div>
</form>
