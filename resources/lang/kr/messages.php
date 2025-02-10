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
                ],
                'add_button' => "새 회원 추가",
                'filter_user' => "회원 그룹 선택"
            ],
        ],
        'modal' => [
            'title' => [
                'create' => '새 회원 추가',
                'edit' => '회원 수정',
            ],
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
            'avatar_placeholder' => 'URL 입력 또는 사진 선택',
            'contact_info' => '연락처 정보',
            'city' => '도시',
            'district' => '구/군',
            'ward' => '동/읍',
            'address' => '주소',
            'address_placeholder' => '주소 입력 (있다면)',
            'phone' => '전화번호',
            'phone_placeholder' => '연락처 전화번호 입력',
            'note' => '메모',
            'note_placeholder' => '메모 입력 (있다면)',
            'password' => [
                'label' => '비밀번호',
                'placeholder' => '비밀번호 입력',
                'confirm_label' => '비밀번호 확인',
                'confirm_placeholder' => '비밀번호 다시 입력',
            ],
        ]
    ],
    'user_catalogue' => [
        'index' => [
            'title' => "회원 그룹 관리",
            'table' => [
                'title' => "그룹 이름",
                'table_header' => [
                    'name' => '이름',
                    'description' => '설명',
                    'email' => '이메일',
                    'phone' => '전화번호',
                    'user_count' => '회원 수',
                ],
                'add_button' => "새 그룹 추가",
            ],
        ],
        'modal' => [
            'title' => [
                'create' => '새 회원 그룹 추가',
                'edit' => '회원 그룹 수정',
                'translate' => '회원 그룹을 다른 언어로 번역'
            ],
            'name' => '회원 그룹 이름',
            'phone' => '전화번호',
            'email' => '이메일',
            'description' => '간단한 설명',
            'language' => '표시 언어 선택',
            'name_placeholder' => '회원 그룹 이름 입력',
            'phone_placeholder' => '전화번호 입력',
            'email_placeholder' => '이메일 입력',
            'description_placeholder' => '설명 입력',
        ]
    ],
    'language' => [
        'index' => [
            'title' => "언어 관리",
            'table' => [
                'title' => "언어 목록",
                'table_header' => [
                    'image' => '이미지',
                    'name' => '언어 이름',
                    'description' => '설명',
                    'canonical' => '표준 경로 (Canonical)',
                ],
                'add_button' => "새 언어 추가",
            ],
        ],
        'modal' => [
            'title' => [
                'create' => '새 언어 추가',
                'edit' => '새 언어 추가',
            ],
            'name' => '언어 이름',
            'canonical' => '표준 경로 (Canonical)',
            'description' => '간단한 설명',
            'image' => '이미지',
            'name_placeholder' => '언어 이름 입력',
            'canonical_placeholder' => '표준 경로 입력',
            'description_placeholder' => '간단한 설명 입력',
            'image_placeholder' => '대표 이미지 선택',
        ]
    ],
    'notifications' => [
        'create_success' => "새로 만들기 성공!",
        'create_error' => "새로 만들기 중 오류가 발생했습니다!",
        'update_success' => "정보 업데이트 성공!",
        'update_error' => "업데이트 중 오류가 발생했습니다!",
        'delete_success' => "데이터 삭제 성공!",
        'delete_error' => "데이터 삭제 중 오류가 발생했습니다!",
        'delete_error_users_exist' => "사용자가 이 그룹을 사용 중이므로 그룹을 삭제할 수 없습니다. 회원을 먼저 삭제해주세요!",
        'not_found' => "요청한 데이터를 찾을 수 없습니다.",
        'no_changes' => "변경 사항이 없습니다.",
        'translation_saved_successfully' => '번역이 성공적으로 저장되었습니다.',
        'error_saving_translation' => '번역을 저장하는 동안 오류가 발생했습니다.',
    ],
    'publish' => [
        '' => '상태 선택',
        '2' => '출판',
        '1' => '비공개',
    ],
    'perpage' => '레코드',
    'keyword_placeholder' => '검색...',
    'status' => '상태',
    'actions' => [
        'title' => '작업',
        'edit' => '편집',
        'translate' => '번역',
        'delete' => '삭제',
    ],
    'confirmJs' => [
        'title' => "확인하시겠습니까?",
        'text' => "이 작업은 되돌릴 수 없습니다!",
        'confirmButton' => "예, 삭제합니다!",
        'cancelButton' => "취소",
        'successTitle' => "삭제 완료!",
        'errorTitle' => "오류!",
        'deleteSuccess' => "삭제 성공.",
        'deleteError' => "삭제 중 오류가 발생했습니다."
    ],
    "modal" => [
        'close' => '닫기',
        'confirm' => '확인',
    ],
    'icon_explanation' => '아이콘 설명:',
    'translated' => '번역됨',
    'not_translated' => '번역되지 않음',
    'cannot_be_empty' => '정보를 비울 수 없습니다.',
    'original_language' => '원본 언어',
    'required_fields' => ':icon 아이콘이 있는 필드는 필수 입력 항목입니다.',
];