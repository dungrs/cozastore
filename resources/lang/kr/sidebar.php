<?php 

return [
    'module' => [
        [
            'menu_title' => '카테고리'
        ],
        [
            'title' => '대시보드',
            'icon' => 'bx bx-home-circle',
            'name' => ['dashboard'],
        ],
        [
            'menu_title' => '애플리케이션'
        ],
        [
            'title' => '회원 그룹 관리',
            'icon' => 'bx bxs-user',
            'name' => ['user'],
            'subModule' => [
                [
                    'title' => '회원 그룹 관리',
                    'route' => 'user.catalogue.index'
                ],
                [
                    'title' => '회원 관리',
                    'route' => 'user.index'
                ]
            ]
        ],
        [
            'title' => '일반 설정',
            'icon' => 'bx bxs-cog',
            'name' => ['language'],
            'subModule' => [
                [
                    'title' => '언어 관리',
                    'route' => 'language.index'
                ],
                
            ]
        ],
        // [
        //     'title' => '제품 관리',
        //     'icon' => 'bx bx-cube',
        //     'name' => 'product',
        //     'subModule' => [
        //         [
        //             'title' => '제품 그룹 관리',
        //             'route' => 'product.catalogue.index'
        //         ],
        //         [
        //             'title' => '제품 관리',
        //             'route' => 'product.index'
        //         ]
        //     ]
        // ]
    ]
];