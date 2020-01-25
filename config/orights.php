<?php

return [
    'works'  => [
        'work_files' => [
            'mimes'    => 'jpeg,bmp,png,pdf',
            'size'    => 2, //in MB
            'message'    => '',
        ],
        'cover' => [
            'mimes'    => 'jpeg,bmp,png,gif,svg',
            'size'    => 2, //in MB
            'message'    => 'Extensões permitidas: jpeg, png, bmp, gif ou svg. Tamanho máximo 2MB.',
        ],
    ],
    'posts'  => [
        'short_image' => [
            'mimes'    => 'jpeg,bmp,png,gif',
            'size'    => 2, //in MB
            'message'    => 'Extensões permitidas: jpeg, png, bmp ou gif. Tamanho máximo 2MB.',
        ],
    ],
];
