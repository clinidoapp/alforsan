<?php

return [

    'contact' => [

        'full_name' => [
            'required' => 'الاسم بالكامل مطلوب',
            'min'      => 'الاسم يجب ألا يقل عن 3 أحرف',
        ],

        'phone' => [
            'required' => 'رقم الهاتف مطلوب',
            'regex'    => 'يرجى إدخال رقم هاتف مصري صحيح',
        ],

        'email' => [
            'email' => 'يرجى إدخال بريد إلكتروني صحيح',
        ],

        'service' => [
            'required' => 'يرجى اختيار الخدمة',
            'exists'   => 'الخدمة المختارة غير صحيحة',
        ],
    ],
    'doctor' => [
        'required' => 'حقل :attribute مطلوب.',
        'string'   => 'حقل :attribute يجب أن يكون نصًا.',
        'image'    => 'حقل :attribute يجب أن يكون صورة.',
        'mimes'    => 'حقل :attribute يجب أن يكون من نوع: :values.',
        'max'      => [
            'string' => 'حقل :attribute يجب ألا يزيد عن :max حرف.',
            'file'   => 'حقل :attribute يجب ألا يزيد عن :max كيلوبايت.',
        ],
        'exists' => 'القيمة المختارة في حقل :attribute غير صحيحة.',


    ]
];
