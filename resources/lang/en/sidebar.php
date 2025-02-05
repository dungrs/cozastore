<?php 

return [
    'module' => [
        [
            'menu_title' => 'Menu'
        ],
        [
            'title' => 'Dashboard',
            'icon' => 'bx bx-home-circle',
            'name' => 'dashboard',
        ],
        [
            'menu_title' => 'Application'
        ],
        [
            'title' => 'Member Group Management',
            'icon' => 'bx bxs-user',
            'name' => 'user',
            'subModule' => [
                [
                    'title' => 'Member Group Management',
                    'route' => 'user.catalogue.index'
                ],
                [
                    'title' => 'Member Management',
                    'route' => 'user.index'
                ]
            ]
        ],
        // [
        //     'title' => 'Product Management',
        //     'icon' => 'bx bx-cube',
        //     'name' => 'user',
        //     'subModule' => [
        //         [
        //             'title' => 'Product Category Management',
        //             'route' => 'user.index'
        //         ],
        //         [
        //             'title' => 'Product Management',
        //             'route' => 'user.catalogue.index'
        //         ]
        //     ]
        // ]
    ]
];
