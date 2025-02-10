<?php 

return [
    'module' => [
        [
            'menu_title' => 'Categories'
        ],
        [
            'title' => 'Dashboard',
            'icon' => 'bx bx-home-circle',
            'name' => ['dashboard'],
        ],
        [
            'menu_title' => 'Applications'
        ],
        [
            'title' => 'Member Group Management',
            'icon' => 'bx bxs-user',
            'name' => ['user'],
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
        [
            'title' => 'General Configuration',
            'icon' => 'bx bxs-cog',
            'name' => ['language'],
            'subModule' => [
                [
                    'title' => 'Language Management',
                    'route' => 'language.index'
                ],
            ]
        ],
        // [
        //     'title' => 'Product Management',
        //     'icon' => 'bx bx-cube',
        //     'name' => 'product',
        //     'subModule' => [
        //         [
        //             'title' => 'Product Group Management',
        //             'route' => 'product.catalogue.index'
        //         ],
        //         [
        //             'title' => 'Product Management',
        //             'route' => 'product.index'
        //         ]
        //     ]
        // ]
    ]
];