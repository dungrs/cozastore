<?php 

return [
    'user' => [
        'index' => [
            'title' => "Member Management",
            'table' => [
                'title' => "Member List",
                'table_header' => [
                    'name' => 'Full Name',
                    'contact' => 'Phone Number / Email',
                    'address' => 'Address',
                    'group' => 'Member Group',
                    'status' => 'Status',
                    'actions' => 'Actions'
                ],
                'add_button' => "Add New Member",
                'filter_user' => "Select Member Group"
            ],
        ],
        'modal' => [
            'add_member' => 'Add New Member',
            'common_info' => 'General Information',
            'name' => 'Full Name',
            'name_placeholder' => 'Enter full name',
            'email' => 'Email',
            'email_placeholder' => 'Enter your email',
            'group' => 'Member Group',
            'group_placeholder' => 'Select member group',
            'birthday' => 'Birthday',
            'birthday_placeholder' => 'Select birthday (dd/mm/yyyy)',
            'avatar' => 'Avatar',
            'avatar_placeholder' => 'Enter URL or choose an image',
            'contact_info' => 'Contact Information',
            'city' => 'City',
            'district' => 'District',
            'ward' => 'Ward',
            'address' => 'Address',
            'address_placeholder' => 'Enter address (if any)',
            'phone' => 'Phone Number',
            'phone_placeholder' => 'Enter contact phone number',
            'note' => 'Note',
            'note_placeholder' => 'Enter note (if any)',
            'password' => [
                'label' => 'Password',
                'placeholder' => 'Enter password',
                'confirm_label' => 'Confirm password',
                'confirm_placeholder' => 'Confirm password',
            ],
        ]
    ],
    'user_catalogue' => [
        'index' => [
            'title' => "Member Group Management",
            'table' => [
                'title' => "Member Group List",
                'table_header' => [
                    'name' => 'Name',
                    'description' => 'Description',
                    'email' => 'Email',
                    'phone' => 'Phone Number',
                    'user_count' => 'Number of Members',
                    'status' => 'Status',
                    'actions' => 'Actions'
                ],
                'add_button' => "Add New Member Group",
            ],
        ],
        'modal' => [
            'add_member' => 'Add New Member Group',
            'name' => 'Member Group Name',
            'phone' => 'Phone Number',
            'email' => 'Email',
            'description' => 'Short Description',
            'name_placeholder' => 'Enter member group name',
            'phone_placeholder' => 'Enter phone number',
            'email_placeholder' => 'Enter email',
            'description_placeholder' => 'Enter description',
        ]
    ],
    'notifications' => [
        'create_success' => "Successfully created!",
        'create_error' => "An error occurred while creating the data!",
        'update_success' => "Information updated successfully!",
        'update_error' => "An error occurred while updating the data!",
        'delete_success' => "Data deleted successfully!",
        'delete_error' => "An error occurred while deleting the data!",
        'delete_error_users_exist' => "Unable to delete the member group because there are users currently using this group. Please delete the members before deleting the group!",
        'not_found' => "Requested data not found.",
        'no_changes' => "No changes were made.",
    ],
    'publish' => [
        '' => 'Select Status',
        '2' => 'Published',
        '1' => 'Not Published',
    ],
    'perpage' => 'records',
    'keyword_placeholder' => 'Search...',
    'confirmJs' => [
        'title' => "Are you sure?",
        'text' => "You will not be able to undo this action!",
        'confirmButton' => "Yes, delete it!",
        'cancelButton' => "Cancel",
        'successTitle' => "Deleted!",
        'errorTitle' => "Error!",
        'deleteSuccess' => "Deleted successfully.",
        'deleteError' => "An error occurred while deleting."
    ],
    "modal" => [
        'close' => 'Close',
        'confirm' => 'Confirm',
    ]
];