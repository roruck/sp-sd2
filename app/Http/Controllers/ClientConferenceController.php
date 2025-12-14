<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ClientConferenceController extends Controller
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
        $today = Carbon::today();

        $conferences = Conference::query()
            ->whereDate('date', '>=', $today)
            ->orderBy('date')
            ->get()
            ->map(fn (Conference $c) => $this->toArrayConference($c))
            ->values()
            ->all();

        return view('client.conferences.index', [
            'currentUser' => [
                'first_name' => auth()->user()->first_name,
                'last_name' => auth()->user()->last_name,
            ],
            'conferences' => $conferences,
        ]);
    }

    public function show(int $id)
    {
        $conference = Conference::findOrFail($id);

        return view('client.conferences.show', [
            'currentUser' => [
                'first_name' => auth()->user()->first_name,
                'last_name' => auth()->user()->last_name,
            ],
            'conference' => $this->toArrayConference($conference),
        ]);
    }

    public function register(Request $request, int $id)
    {
        $conference = Conference::findOrFail($id);

        // Register logged-in client to conference (users_conferences)
        $request->user()->conferences()->syncWithoutDetaching([$conference->id]);

        return redirect()
            ->route('client.conferences.show', $conference->id)
            ->with('success', __('app.flash.register_success'));
    }
}
