<?php 

return [
    'user' => [
        'index' => [
            'title' => "Quản lý thành viên",
            'table' => [
                'title' => "Danh Sách Thành Viên",
                'table_header' => [
                    'name' => 'Họ Tên',
                    'contact' => 'Số điện thoại / Email',
                    'address' => 'Địa chỉ',
                    'group' => 'Nhóm thành viên',
                    'status' => 'Tình trạng',
                    'actions' => 'Thao tác'
                ],
                'add_button' => "Thêm mới thành viên",
                'filter_user' => "Chọn nhóm thành viên"
            ],
        ],
        'modal' => [
            'add_member' => 'Thêm mới thành viên',
            'common_info' => 'Thông tin chung',
            'name' => 'Họ Tên',
            'name_placeholder' => 'Nhập họ và tên đầy đủ',
            'email' => 'Email',
            'email_placeholder' => 'Nhập email của bạn',
            'group' => 'Nhóm thành viên',
            'group_placeholder' => 'Chọn nhóm thành viên',
            'birthday' => 'Ngày sinh',
            'birthday_placeholder' => 'Chọn ngày sinh (dd/mm/yyyy)',
            'avatar' => 'Ảnh đại diện',
            'avatar_placeholder' => 'Nhập URL hoặc chọn ảnh',
            'contact_info' => 'Thông tin liên hệ',
            'city' => 'Thành phố',
            'district' => 'Quận/Huyện',
            'ward' => 'Phường/Xã',
            'address' => 'Địa chỉ',
            'address_placeholder' => 'Nhập địa chỉ (nếu có)',
            'phone' => 'Số điện thoại',
            'phone_placeholder' => 'Nhập số điện thoại liên hệ',
            'note' => 'Ghi chú',
            'note_placeholder' => 'Nhập ghi chú (nếu có)',
            'password' => [
                'label' => 'Mật khẩu',
                'placeholder' => 'Nhập mật khẩu',
                'confirm_label' => 'Nhập lại mật khẩu',
                'confirm_placeholder' => 'Nhập lại mật khẩu',
            ],
        ]
    ],
    'user_catalogue' => [
        'index' => [
            'title' => "Quản lý nhóm thành viên",
            'table' => [
                'title' => "Danh Sách Nhóm Thành Viên",
                'table_header' => [
                    'name' => 'Họ Tên',
                    'description' => 'Mô tả',
                    'email' => 'Email',
                    'phone' => 'Số điện thoại',
                    'user_count' => 'Số thành viên',
                    'status' => 'Tình trạng',
                    'actions' => 'Thao tác'
                ],
                'add_button' => "Thêm mới nhóm thành viên",
            ],
        ],
        'modal' => [
            'add_member' => 'Thêm mới nhóm thành viên',
            'name' => 'Tên nhóm thành viên',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
            'description' => 'Mô tả ngắn',
            'name_placeholder' => 'Nhập tên nhóm thành viên',
            'phone_placeholder' => 'Nhập số điện thoại',
            'email_placeholder' => 'Nhập vào email',
            'description_placeholder' => 'Nhập mô tả',
        ]
    ],
    'notifications' => [
        'create_success' => "Tạo mới thành công!",
        'create_error' => "Có lỗi xảy ra khi tạo mới dữ liệu!",
        'update_success' => "Cập nhật thông tin thành công!",
        'update_error' => "Có lỗi xảy ra khi cập nhật dữ liệu!",
        'delete_success' => "Xóa dữ liệu thành công!",
        'delete_error' => "Có lỗi xảy ra khi xóa dữ liệu!",
        'delete_error_users_exist' => "Không thể xóa nhóm thành viên vì có người dùng đang sử dụng nhóm này. Vui lòng xóa thành viên trước khi xóa nhóm!",
        'not_found' => "Không tìm thấy dữ liệu yêu cầu.",
        'no_changes' => "Không có thay đổi nào được thực hiện.",
    ],
    'publish' => [
        '' => 'Chọn tình trạng',
        '2' => 'Xuất bản',
        '1' => 'Không xuất bản',
    ],
    'perpage' => 'bản ghi',
    'keyword_placeholder' => 'Tìm kiếm...',
    'confirmJs' => [
        'title' => "Bạn có chắc chắn?",
        'text' => "Bạn sẽ không thể hoàn tác hành động này!",
        'confirmButton' => "Có, xóa nó!",
        'cancelButton' => "Hủy bỏ",
        'successTitle' => "Đã xóa!",
        'errorTitle' => "Lỗi!",
        'deleteSuccess' => "Xóa thành công.",
        'deleteError' => "Đã xảy ra lỗi khi xóa."
    ],
    "modal" => [
        'close' => 'Đóng',
        'confirm' => 'Xác nhận',
    ]
];
