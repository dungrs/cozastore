<?php 

return [
    'user' => [
        'index' => [
            'title' => "회원 관리",
            'table' => [
                'title' => "회원 목록",
                'table_header' => [
                    'name' => '이름',
                    'contact' => '전화번호 / 이메일',
                    'address' => '주소',
                    'group' => '회원 그룹',
                    'status' => '상태',
                    'actions' => '작업'
                ],
                'add_button' => "새 회원 추가",
                'filter_user' => "회원 그룹 선택"
            ],
        ],
        'modal' => [
            'add_member' => '새 회원 추가',
            'common_info' => '일반 정보',
            'name' => '이름',
            'name_placeholder' => '전체 이름을 입력하세요',
            'email' => '이메일',
            'email_placeholder' => '이메일을 입력하세요',
            'group' => '회원 그룹',
            'group_placeholder' => '회원 그룹 선택',
            'birthday' => '생일',
            'birthday_placeholder' => '생일 선택 (dd/mm/yyyy)',
            'avatar' => '프로필 사진',
            'avatar_placeholder' => 'URL을 입력하거나 사진 선택',
            'contact_info' => '연락처 정보',
            'city' => '도시',
            'district' => '구/군',
            'ward' => '동/읍',
            'address' => '주소',
            'address_placeholder' => '주소 입력 (있다면)',
            'phone' => '전화번호',
            'phone_placeholder' => '연락처 전화번호 입력',
            'note' => '비고',
            'note_placeholder' => '비고 입력 (있다면)',
            'password' => [
                'label' => '비밀번호',
                'placeholder' => '비밀번호 입력',
                'confirm_label' => '비밀번호 확인',
                'confirm_placeholder' => '비밀번호 확인 입력',
            ],
        ]
    ],
    'user_catalogue' => [
        'index' => [
            'title' => "회원 그룹 관리",
            'table' => [
                'title' => "회원 그룹 목록",
                'table_header' => [
                    'name' => '이름',
                    'description' => '설명',
                    'email' => '이메일',
                    'phone' => '전화번호',
                    'user_count' => '회원 수',
                    'status' => '상태',
                    'actions' => '작업'
                ],
                'add_button' => "새 회원 그룹 추가",
            ],
        ],
        'modal' => [
            'add_member' => '새 회원 그룹 추가',
            'name' => '회원 그룹 이름',
            'phone' => '전화번호',
            'email' => '이메일',
            'description' => '간단한 설명',
            'name_placeholder' => '회원 그룹 이름 입력',
            'phone_placeholder' => '전화번호 입력',
            'email_placeholder' => '이메일 입력',
            'description_placeholder' => '설명 입력',
        ]
    ],
    'notifications' => [
        'create_success' => "새로 만들었습니다!",
        'create_error' => "데이터 생성 중 오류가 발생했습니다!",
        'update_success' => "정보가 성공적으로 업데이트되었습니다!",
        'update_error' => "데이터 업데이트 중 오류가 발생했습니다!",
        'delete_success' => "데이터가 성공적으로 삭제되었습니다!",
        'delete_error' => "데이터 삭제 중 오류가 발생했습니다!",
        'delete_error_users_exist' => "이 회원 그룹을 삭제할 수 없습니다. 이 그룹을 사용 중인 사용자가 있습니다. 그룹을 삭제하기 전에 사용자를 먼저 삭제하십시오!",
        'not_found' => "요청된 데이터를 찾을 수 없습니다.",
        'no_changes' => "변경된 사항이 없습니다.",
    ],
    'publish' => [
        '' => '상태 선택',
        '2' => '출판',
        '1' => '출판되지 않음',
    ],
    'perpage' => '레코드',
    'keyword_placeholder' => '검색...',
    'confirmJs' => [
        'title' => "정말로 삭제하시겠습니까?",
        'text' => "이 작업은 되돌릴 수 없습니다!",
        'confirmButton' => "예, 삭제합니다!",
        'cancelButton' => "취소",
        'successTitle' => "삭제되었습니다!",
        'errorTitle' => "오류 발생!",
        'deleteSuccess' => "삭제 성공.",
        'deleteError' => "삭제 중 오류가 발생했습니다."
    ],
    "modal" => [
        'close' => '닫기',
        'confirm' => '확인',
    ]
];