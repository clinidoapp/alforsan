<?php

return [

    'contact' => [

        'full_name' => [
            'required' => 'Full name is required.',
            'min'      => 'Full name must be at least 3 characters.',
        ],

        'phone' => [
            'required' => 'Phone number is required.',
            'regex'    => 'Please enter a valid Egyptian phone number.',
        ],

        'email' => [
            'email' => 'Please enter a valid email address.',
        ],

        'service' => [
            'required' => 'Please select a service.',
            'exists'   => 'Selected service is invalid.',
        ],
    ],
];
