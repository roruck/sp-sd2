<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Support\Carbon;

class EmployeeConferenceController extends Controller
{
    private function toArrayConference(Conference $c): array
    {
        return [
            'id' => $c->id,
            'title' => $c->title,
            'description' => $c->description,
            'speakers' => $c->speakers,
            'date' => optional($c->date)->toDateString() ?? (string) $c->date,
            'time' => $c->time,
            'address' => $c->address,
        ];
    }

    public function index()
    {
        $conferences = Conference::query()
            ->orderBy('date', 'desc')
            ->get()
            ->map(fn (Conference $c) => $this->toArrayConference($c))
            ->values()
            ->all();

        return view('employee.conferences.index', [
            'currentUser' => [
                'first_name' => auth()->user()->first_name,
                'last_name' => auth()->user()->last_name,
            ],
            'conferences' => $conferences,
            'today' => Carbon::today(),
        ]);
    }

    public function show(int $id)
    {
        $conference = Conference::with(['users.roles'])->findOrFail($id);

        $clients = $conference->users
            ->filter(fn ($u) => $u->roles->contains('slug', 'client'))
            ->map(fn ($u) => [
                'name' => trim(($u->first_name ?? '') . ' ' . ($u->last_name ?? '')) ?: ($u->name ?? 'Client'),
                'email' => $u->email,
            ])
            ->values()
            ->all();

        return view('employee.conferences.show', [
            'currentUser' => [
                'first_name' => auth()->user()->first_name,
                'last_name' => auth()->user()->last_name,
            ],
            'conference' => $this->toArrayConference($conference),
            'registrations' => $clients,
        ]);
    }
}
