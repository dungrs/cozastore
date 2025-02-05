<?php

return [
    'user' => [
        'email' => [
            'required' => 'Please enter an email address.',
            'email' => 'Invalid email format. Example: abc@gmail.com.',
            'unique' => 'This email is already in use. Please choose another email.',
            'string' => 'Email must be a valid string.',
            'max' => 'Email must not exceed 250 characters.',
        ],
        'name' => [
            'required' => 'Please enter your full name.',
            'string' => 'Full name must be a valid string.',
        ],
        'user_catalogue_id' => [
            'gt' => 'Please select a valid user group.',
            'required' => 'Please select a valid user group.',
        ],
        'birthday' => [
            'required' => 'Please enter your date of birth.',
            'date_format' => 'Invalid date format. Please enter in the format dd/mm/yyyy.',
        ],
        'password' => [
            'required' => 'Please enter a password.',
            'min' => 'Password must be at least 6 characters.',
        ],
        're_password' => [
            'required' => 'Please re-enter your password.',
            'same' => 'The re-entered password does not match.',
        ],
    ],
    'user_catalogue' => [
        'name' => [
            'required' => 'User group name cannot be empty.',
            'string' => 'User group name must be a string.',
            'max' => 'User group name must not exceed 255 characters.',
        ],
        'email' => [
            'required' => 'Email cannot be empty.',
            'email' => 'Invalid email format.',
        ],
        'phone' => [
            'required' => 'Phone number cannot be empty.',
            'string' => 'Phone number must be a string.',
            'max' => 'Phone number must not exceed 20 characters.',
        ],
        'description' => [
            'string' => 'Description must be a string.',
            'max' => 'Description must not exceed 500 characters.',
        ],
    ]
];