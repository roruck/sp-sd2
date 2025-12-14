<?php

namespace App\Services;

use Illuminate\Support\Carbon;

class FakeData
{
    public static function seed(): void
    {
        if (!session()->has('conferences')) {
            session()->put('conferences', [
                1 => [
                    'id' => 1,
                    'title' => 'AI in Business',
                    'description' => 'Short demo description for SD1.',
                    'speakers' => 'John Doe',
                    'date' => Carbon::now()->addDays(10)->toDateString(),
                    'time' => '10:00',
                    'address' => 'Vilnius, LT',
                ],
                2 => [
                    'id' => 2,
                    'title' => 'Web Security Basics',
                    'description' => 'HTTPS, OWASP and secure coding.',
                    'speakers' => 'Jane Doe',
                    'date' => Carbon::now()->subDays(2)->toDateString(), // past conference
                    'time' => '12:00',
                    'address' => 'Kaunas, LT',
                ],
                3 => [
                    'id' => 3,
                    'title' => 'Cloud DevOps',
                    'description' => 'CI/CD pipelines and deployment.',
                    'speakers' => 'Alex Smith',
                    'date' => Carbon::now()->addDays(30)->toDateString(),
                    'time' => '09:30',
                    'address' => 'Klaipėda, LT',
                ],
            ]);
        }

        if (!session()->has('users')) {
            session()->put('users', [
                1 => ['id' => 1, 'first_name' => 'Admin', 'last_name' => 'User', 'email' => 'admin@example.com'],
                2 => ['id' => 2, 'first_name' => 'Client', 'last_name' => 'User', 'email' => 'client@example.com'],
                3 => ['id' => 3, 'first_name' => 'Employee', 'last_name' => 'User', 'email' => 'employee@example.com'],
            ]);
        }

        // registrations: [conferenceId => [ ['name'=>..., 'email'=>...], ... ]]
        if (!session()->has('registrations')) {
            session()->put('registrations', [
                1 => [
                    ['name' => 'Petras Petraitis', 'email' => 'petras@mail.com'],
                ],
            ]);
        }
    }

    public static function conferences(): array
    {
        self::seed();
        return session('conferences', []);
    }

    public static function users(): array
    {
        self::seed();
        return session('users', []);
    }

    public static function registrations(): array
    {
        self::seed();
        return session('registrations', []);
    }
}
