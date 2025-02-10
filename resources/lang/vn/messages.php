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
                ],
                'add_button' => "Thêm mới thành viên",
                'filter_user' => "Chọn nhóm thành viên"
            ],
        ],
        'modal' => [
            'title' => [
                'create' => 'Thêm thành viên mới',
                'edit' => 'Chỉnh sửa thành viên',
            ],
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
                    'name' => 'Tên nhóm',
                    'description' => 'Mô tả',
                    'email' => 'Email',
                    'phone' => 'Số điện thoại',
                    'user_count' => 'Số thành viên',
                ],
                'add_button' => "Thêm mới nhóm thành viên",
            ],
        ],
        'modal' => [
            'title' => [
                'create' => 'Thêm nhóm thành viên mới',
                'edit' => 'Chỉnh sửa nhóm thành viên',
                'translate' => 'Dịch nhóm thành viên sang ngôn ngữ khác',
            ],
            'name' => 'Tên nhóm thành viên',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
            'description' => 'Mô tả ngắn',
            'language' => 'Chọn ngôn ngữ hiển thị',
            'name_placeholder' => 'Nhập tên nhóm thành viên',
            'phone_placeholder' => 'Nhập số điện thoại',
            'email_placeholder' => 'Nhập vào email',
            'description_placeholder' => 'Nhập mô tả',
        ]
    ],
    'language' => [
        'index' => [
            'title' => "Quản lý ngôn ngữ",
            'table' => [
                'title' => "Danh sách ngôn ngữ",
                'table_header' => [
                    'image' => 'Ảnh đại diện',
                    'name' => 'Tên ngôn ngữ',
                    'description' => 'Mô tả',
                    'canonical' => 'Đường dẫn chuẩn (Canonical)',
                ],
                'add_button' => "Thêm ngôn ngữ mới",
            ],
        ],
        'modal' => [
            'title' => [
                'create' => 'Thêm ngôn ngữ mới',
                'edit' => 'Chỉnh sửa ngôn ngữ'
            ],
            'name' => 'Tên ngôn ngữ',
            'canonical' => 'Đường dẫn chuẩn (Canonical)',
            'description' => 'Mô tả ngắn',
            'image' => 'Ảnh đại diện',
            'name_placeholder' => 'Nhập tên ngôn ngữ',
            'canonical_placeholder' => 'Nhập đường dẫn chuẩn',
            'description_placeholder' => 'Nhập mô tả ngắn',
            'image_placeholder' => 'Chọn ảnh đại diện',
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
        'translation_saved_successfully' => 'Lưu bản dịch thành công.',
        'error_saving_translation' => 'Đã xảy ra lỗi khi lưu bản dịch.',
    ],
    'publish' => [
        '' => 'Chọn tình trạng',
        '2' => 'Xuất bản',
        '1' => 'Không xuất bản',
    ],
    'perpage' => 'bản ghi',
    'keyword_placeholder' => 'Tìm kiếm...',
    'status' => 'Tình trạng',
    'actions' => [
        'title' => 'Thao tác',
        'edit' => 'Chỉnh sửa',
        'translate' => 'Dịch',
        'delete' => "Xóa",
    ],
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
    ],
    'icon_explanation' => 'Giải thích biểu tượng:',
    'translated' => 'Đã dịch',
    'not_translated' => 'Chưa dịch',
    'cannot_be_empty' => 'Thông tin không được bỏ trống',
    'original_language' => 'Ngôn ngữ gốc',
    'required_fields' => 'Các trường có biểu tượng :icon là bắt buộc nhập.',
];
