<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required' => 'Pole :attribute jest wymagane.',
    'email' => 'Pole :attribute musi być prawidłowym adresem e-mail.',
    'unique' => 'Pole :attribute już zostało zajęte.',
    'min' => [
        'string' => 'Pole :attribute musi mieć co najmniej :min znaków.',
    ],
    'same' => 'Pole :attribute musi być takie samo jak :other.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "rule.attribute". This makes it quick to specify a specific
    | custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'oldPassword' => [
            'required' => 'Bieżące hasło jest wymagane.',
        ],
        'newPassword' => [
            'required' => 'Nowe hasło jest wymagane.',
            'min' => 'Nowe hasło musi mieć co najmniej :min znaków.',
        ],
        'confirmPassword' => [
            'required' => 'Potwierdzenie hasła jest wymagane.',
            'same' => 'Potwierdzenie hasła musi pasować do nowego hasła.',
        ],
    ],
    'password_confirmation' => [
        'required' => 'Potwierdzenie hasła jest wymagane.',
        'same' => 'Potwierdzenie hasła musi pasować do hasła.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'oldPassword' => 'bieżące hasło',
        'newPassword' => 'nowe hasło',
        'confirmPassword' => 'potwierdzenie hasła',
        'name' => 'imię',
        'email' => 'adres e-mail',
        'password' => 'hasło',
        'password_confirmation' => 'potwierdzenie hasła',
    ],

];