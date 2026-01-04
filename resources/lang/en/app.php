<?php

return [
    'app_name' => 'Conference System',

    'nav' => [
        'home' => 'Home',
        'client' => 'Client',
        'employee' => 'Employee',
        'admin' => 'Admin',
        'logout' => 'Logout',
    ],

    'home' => [
        'title' => 'Main page',
        'student' => 'Student information',
        'go_client' => 'Client subsystem',
        'go_employee' => 'Employee subsystem',
        'go_admin' => 'Admin subsystem',
        'note' => 'SD2 system (authentication + database).',
    ],

    'client' => [
        'conferences_title' => 'Planned conferences',
        'only_planned' => 'Only planned',
        'no_conferences' => 'No planned conferences found.',
        'register' => 'Register',
        'register_title' => 'Registration to conference',
        'register_note' => 'Data is saved in database (SD2).',
    ],

    'employee' => [
        'conferences_title' => 'All conferences',
        'status' => 'Status',
        'planned' => 'Planned',
        'past' => 'Past',
        'registered_clients' => 'Registered clients',
        'no_registrations' => 'No registrations yet.',
    ],

    'admin' => [
        'dashboard_title' => 'Admin dashboard',
        'dashboard_desc' => 'Manage users and conferences.',
        'manage_users' => 'User management',
        'manage_conferences' => 'Conference management',
        'users_title' => 'System users',
        'user_edit_title' => 'Edit user',
        'email_readonly' => 'Email can be edited in SD2.',
        'conferences_title' => 'Conferences',
        'create_conference' => 'Create new conference',
        'conference_create_title' => 'Create conference',
        'conference_edit_title' => 'Edit conference',
        'cannot_delete_past' => 'Cannot delete past conferences',
    ],

    'conf' => [
        'title' => 'Title',
        'description' => 'Description',
        'speakers' => 'Speakers',
        'date' => 'Date',
        'time' => 'Time',
        'address' => 'Address',
    ],

    'form' => [
        'id' => 'ID',
        'name' => 'Name',
        'first_name' => 'First name',
        'last_name' => 'Last name',
        'email' => 'Email',
        'save' => 'Save',
    ],

    'table' => [
        'actions' => 'Actions',
        'view' => 'View',
        'edit' => 'Edit',
        'delete' => 'Delete',
    ],

    'js' => [
        'delete_title' => 'Delete?',
        'delete_text' => 'This action cannot be undone.',
        'delete_confirm' => 'Yes, delete',
        'delete_cancel' => 'Cancel',
    ],

    'flash' => [
        'register_success' => 'Registration saved.',
        'user_updated' => 'User updated.',
        'conference_created' => 'Conference created.',
        'conference_updated' => 'Conference updated.',
        'conference_deleted' => 'Conference deleted.',
        'cannot_delete_past' => 'Past conferences cannot be deleted.',
    ],

    'back' => 'Back',
];
