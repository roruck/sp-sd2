<?php

namespace App\Http\Controllers;

use App\Services\FakeData;
use Illuminate\Support\Carbon;

class EmployeeConferenceController extends Controller
{
    private function currentUser(): array
    {
        return ['first_name' => 'Employee', 'last_name' => 'User'];
    }

    public function index()
    {
        $conferences = FakeData::conferences();

        // Employee sees all conferences (past + planned)
        // Sort by date desc
        usort($conferences, function ($a, $b) {
            return strcmp($b['date'], $a['date']);
        });

        return view('employee.conferences.index', [
            'currentUser' => $this->currentUser(),
            'conferences' => $conferences,
            'today' => Carbon::today(),
        ]);
    }

    public function show(int $id)
    {
        $conferences = FakeData::conferences();
        abort_if(!isset($conferences[$id]), 404);

        $registrations = FakeData::registrations();

        return view('employee.conferences.show', [
            'currentUser' => $this->currentUser(),
            'conference' => $conferences[$id],
            'registrations' => $registrations[$id] ?? [],
        ]);
    }
}
