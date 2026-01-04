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
    'doctor' => [
        'required' => 'The :attribute field is required.',
        'string'   => 'The :attribute must be a valid string.',
        'image'    => 'The :attribute must be an image.',
        'mimes'    => 'The :attribute must be a file of type: :values.',
        'max'      => [
            'string' => 'The :attribute may not be greater than :max characters.',
            'file'   => 'The :attribute may not be greater than :max kilobytes.',
        ],
    ]
];
