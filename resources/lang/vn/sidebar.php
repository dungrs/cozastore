<?php 

return [
    'module' => [
        [
            'menu_title' => 'Danh mục'
        ],
        [
            'title' => 'Bảng điều khiển',
            'icon' => 'bx bx-home-circle',
            'name' => 'dashboard',
        ],
        [
            'menu_title' => 'Ứng dụng'
        ],
        [
            'title' => 'QL Nhóm Thành Viên',
            'icon' => 'bx bxs-user',
            'name' => 'user',
            'subModule' => [
                [
                    'title' => 'QL Nhóm Thành Viên',
                    'route' => 'user.catalogue.index'
                ],
                [
                    'title' => 'QL Thành Viên',
                    'route' => 'user.index'
                ]
            ]
        ],
        // [
        //     'title' => 'Quản lý sản phẩm',
        //     'icon' => 'bx bx-cube',
        //     'name' => 'product',
        //     'subModule' => [
        //         [
        //             'title' => 'Quản lý nhóm sản phẩm',
        //             'route' => 'product.catalogue.index'
        //         ],
        //         [
        //             'title' => 'Quản lý sản phẩm',
        //             'route' => 'product.index'
        //         ]
        //     ]
        // ]
    ]
];