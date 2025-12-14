<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConferenceRequest;
use App\Models\Conference;
use Illuminate\Support\Carbon;

class ConferenceController extends Controller
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

        return view('admin.conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view('admin.conferences.create');
    }

    public function store(ConferenceRequest $request)
    {
        Conference::create($request->validated());

        return redirect()->route('admin.conferences.index')
            ->with('success', __('app.flash.conference_created'));
    }

    public function edit(int $id)
    {
        $conference = Conference::findOrFail($id);

        return view('admin.conferences.edit', ['conference' => $this->toArrayConference($conference)]);
    }

    public function update(ConferenceRequest $request, int $id)
    {
        $conference = Conference::findOrFail($id);
        $conference->update($request->validated());

        return redirect()->route('admin.conferences.index')
            ->with('success', __('app.flash.conference_updated'));
    }

    public function destroy(int $id)
    {
        $conference = Conference::findOrFail($id);

        if (Carbon::parse($conference->date)->isPast()) {
            return redirect()->route('admin.conferences.index')
                ->with('error', __('app.flash.conference_delete_blocked'));
        }

        $conference->delete();

        return redirect()->route('admin.conferences.index')
            ->with('success', __('app.flash.conference_deleted'));
    }
}
