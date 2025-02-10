<?php 

return [
    'user' => [
        'index' => [
            'title' => "Manage Members",
            'table' => [
                'title' => "Member List",
                'table_header' => [
                    'name' => 'Full Name',
                    'contact' => 'Phone Number / Email',
                    'address' => 'Address',
                    'group' => 'Member Group',
                ],
                'add_button' => "Add New Member",
                'filter_user' => "Select Member Group"
            ],
        ],
        'modal' => [
            'title' => [
                'create' => 'Add a new member',
                'edit' => 'Edit member',
            ],
            'common_info' => 'General Information',
            'name' => 'Full Name',
            'name_placeholder' => 'Enter full name',
            'email' => 'Email',
            'email_placeholder' => 'Enter your email',
            'group' => 'Member Group',
            'group_placeholder' => 'Select Member Group',
            'birthday' => 'Birthday',
            'birthday_placeholder' => 'Select birthdate (dd/mm/yyyy)',
            'avatar' => 'Avatar',
            'avatar_placeholder' => 'Enter URL or select an image',
            'contact_info' => 'Contact Information',
            'city' => 'City',
            'district' => 'District/County',
            'ward' => 'Ward/Commune',
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
            'title' => "Manage Member Groups",
            'table' => [
                'title' => "Member Group List",
                'table_header' => [
                    'name' => 'Name Group',
                    'description' => 'Description',
                    'email' => 'Email',
                    'phone' => 'Phone Number',
                    'user_count' => 'Member Count',
                ],
                'add_button' => "Add New Member Group",
            ],
        ],
        'modal' => [
            'title' => [
                'create' => 'Add a new member group',
                'edit' => 'Edit member group',
                'translate' => 'Translate member group into another language'
            ],
            'create' => [
                'title' => 'Add a new member group'
            ],
            'edit' => [
                'title' => 'Edit member group'
            ],
            'translate' => [
                'title' => 'Translate member group into another language'
            ],
            'name' => 'Member Group Name',
            'phone' => 'Phone Number',
            'email' => 'Email',
            'description' => 'Short Description',
            'language' => 'Select display language',
            'name_placeholder' => 'Enter member group name',
            'phone_placeholder' => 'Enter phone number',
            'email_placeholder' => 'Enter email',
            'description_placeholder' => 'Enter description',
        ]
    ],
    'language' => [
        'index' => [
            'title' => "Manage Languages",
            'table' => [
                'title' => "Language List",
                'table_header' => [
                    'image' => 'Avatar',
                    'name' => 'Language Name',
                    'description' => 'Description',
                    'canonical' => 'Canonical URL',
                ],
                'add_button' => "Add New Language",
            ],
        ],
        'modal' => [
            'title' => [
                'create' => 'Add a new language',
                'edit' => 'Edit language',
            ],
            'name' => 'Language Name',
            'canonical' => 'Canonical URL',
            'description' => 'Short Description',
            'image' => 'Avatar',
            'name_placeholder' => 'Enter language name',
            'canonical_placeholder' => 'Enter canonical URL',
            'description_placeholder' => 'Enter short description',
            'image_placeholder' => 'Select avatar image',
        ]
    ],
    'notifications' => [
        'create_success' => "Successfully created!",
        'create_error' => "An error occurred while creating the data!",
        'update_success' => "Information updated successfully!",
        'update_error' => "An error occurred while updating the data!",
        'delete_success' => "Data deleted successfully!",
        'delete_error' => "An error occurred while deleting the data!",
        'delete_error_users_exist' => "Cannot delete the member group because there are users using this group. Please delete the members first before deleting the group!",
        'not_found' => "Requested data not found.",
        'no_changes' => "No changes were made.",
        'translation_saved_successfully' => 'Translation saved successfully.',
        'error_saving_translation' => 'An error occurred while saving translation.',
    ],
    'publish' => [
        '' => 'Select status',
        '2' => 'Published',
        '1' => 'Unpublished',
    ],
    'perpage' => 'records',
    'keyword_placeholder' => 'Search...',
    'status' => 'Status',
    'actions' => [
        'title' => 'Actions',
        'edit' => 'Edit',
        'translate' => 'Translate',
        'delete' => 'Delete',
    ],
    'confirmJs' => [
        'title' => "Are you sure?",
        'text' => "You will not be able to undo this action!",
        'confirmButton' => "Yes, delete it!",
        'cancelButton' => "Cancel",
        'successTitle' => "Deleted!",
        'errorTitle' => "Error!",
        'deleteSuccess' => "Deleted successfully.",
        'deleteError' => "An error occurred while deleting.",
    ],
    "modal" => [
        'close' => 'Close',
        'confirm' => 'Confirm',
    ],
    'icon_explanation' => 'Icon Explanation:',
    'translated' => 'Translated',
    'not_translated' => 'Not Translated',
    'cannot_be_empty' => 'Information cannot be empty',
    'original_language' => 'Original Language',
    'required_fields' => 'Fields with the :icon icon are required.',
];