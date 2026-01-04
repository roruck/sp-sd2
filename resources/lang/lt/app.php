<?php

return [
    'app_name' => 'Konferencijų sistema',

    'nav' => [
        'home' => 'Pradžia',
        'client' => 'Klientas',
        'employee' => 'Darbuotojas',
        'admin' => 'Administratorius',
        'logout' => 'Atsijungti',
    ],

    'auth' => [
        'login' => 'Prisijungti',
        'register' => 'Registruotis',
        'remember' => 'Prisiminti mane',
        'invalid_credentials' => 'Neteisingi prisijungimo duomenys.',
    ],

    'home' => [
        'title' => 'Pagrindinis puslapis',
        'student' => 'Studento informacija',
        'go_client' => 'Kliento posistemis',
        'go_employee' => 'Darbuotojo posistemis',
        'go_admin' => 'Administratoriaus posistemis',
        'note' => 'SD1 demo sistema (be autentifikacijos ir be duomenų bazės).',
    ],

    'client' => [
        'conferences_title' => 'Planuojamos konferencijos',
        'only_planned' => 'Tik planuojamos',
        'no_conferences' => 'Planuojamų konferencijų nerasta.',
        'register' => 'Registruotis',
        'register_title' => 'Registracija į konferenciją',
        'register_note' => 'Duomenys saugomi sesijoje (SD1 etape DB nenaudojama).',
    ],

    'employee' => [
        'conferences_title' => 'Visos konferencijos',
        'status' => 'Būsena',
        'planned' => 'Planuojama',
        'past' => 'Įvykusi',
        'registered_clients' => 'Užsiregistravę klientai',
        'no_registrations' => 'Registracijų dar nėra.',
    ],

    'admin' => [
        'dashboard_title' => 'Administratoriaus pagrindinis puslapis',
        'dashboard_desc' => 'Naudotojų ir konferencijų valdymas.',
        'manage_users' => 'Naudotojų valdymas',
        'manage_conferences' => 'Konferencijų valdymas',
        'users_title' => 'Sistemos naudotojai',
        'user_edit_title' => 'Naudotojo redagavimas',
        'email_readonly' => 'El. paštas SD1 etape tik peržiūrai.',
        'conferences_title' => 'Konferencijos',
        'create_conference' => 'Kurti naują konferenciją',
        'conference_create_title' => 'Konferencijos kūrimas',
        'conference_edit_title' => 'Konferencijos redagavimas',
        'cannot_delete_past' => 'Negalima trinti įvykusių konferencijų',
    ],

    'conf' => [
        'title' => 'Pavadinimas',
        'description' => 'Aprašymas',
        'speakers' => 'Lektoriai',
        'date' => 'Data',
        'time' => 'Laikas',
        'address' => 'Adresas',
    ],

    'form' => [
        'id' => 'ID',
        'name' => 'Vardas',
        'first_name' => 'Vardas',
        'last_name' => 'Pavardė',
        'email' => 'El. paštas',
        'save' => 'Išsaugoti',
    ],

    'table' => [
        'actions' => 'Veiksmai',
        'view' => 'Peržiūra',
        'edit' => 'Redaguoti',
        'delete' => 'Trinti',
    ],

    'js' => [
        'delete_title' => 'Trinti?',
        'delete_text' => 'Šio veiksmo atšaukti negalima.',
        'delete_confirm' => 'Taip, trinti',
        'delete_cancel' => 'Atšaukti',
    ],

    'flash' => [
        'register_success' => 'Registracija išsaugota.',
        'user_updated' => 'Naudotojas atnaujintas.',
        'conference_created' => 'Konferencija sukurta.',
        'conference_updated' => 'Konferencija atnaujinta.',
        'conference_deleted' => 'Konferencija ištrinta.',
        'cannot_delete_past' => 'Įvykusių konferencijų trinti negalima.',
    ],

    'back' => 'Atgal',
];
