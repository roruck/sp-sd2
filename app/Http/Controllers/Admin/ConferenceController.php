<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConferenceRequest;
use App\Services\FakeData;
use Illuminate\Support\Carbon;

class ConferenceController extends Controller
{
    private function currentUser(): array
    {
        return ['first_name' => 'Admin', 'last_name' => 'User'];
    }

    public function index()
    {
        $conferences = FakeData::conferences();

        // Sort by date desc
        usort($conferences, function ($a, $b) {
            return strcmp($b['date'], $a['date']);
        });

        return view('admin.conferences.index', [
            'currentUser' => $this->currentUser(),
            'conferences' => $conferences,
            'today' => Carbon::today(),
        ]);
    }

    public function create()
    {
        return view('admin.conferences.create', [
            'currentUser' => $this->currentUser(),
            'conference' => [
                'title' => '',
                'description' => '',
                'speakers' => '',
                'date' => '',
                'time' => '',
                'address' => '',
            ],
        ]);
    }

    public function store(ConferenceRequest $request)
    {
        $conferences = FakeData::conferences();

        $newId = empty($conferences) ? 1 : (max(array_keys($conferences)) + 1);
        $data = $request->validated();
        $data['id'] = $newId;

        $conferences[$newId] = $data;
        session()->put('conferences', $conferences);

        return redirect()
            ->route('admin.conferences.index')
            ->with('success', __('app.flash.conference_created'));
    }

    public function edit(int $id)
    {
        $conferences = FakeData::conferences();
        abort_if(!isset($conferences[$id]), 404);

        return view('admin.conferences.edit', [
            'currentUser' => $this->currentUser(),
            'conference' => $conferences[$id],
        ]);
    }

    public function update(ConferenceRequest $request, int $id)
    {
        $conferences = FakeData::conferences();
        abort_if(!isset($conferences[$id]), 404);

        $data = $request->validated();
        $data['id'] = $id;

        $conferences[$id] = $data;
        session()->put('conferences', $conferences);

        return redirect()
            ->route('admin.conferences.index')
            ->with('success', __('app.flash.conference_updated'));
    }

    public function destroy(int $id)
    {
        $conferences = FakeData::conferences();
        abort_if(!isset($conferences[$id]), 404);

        $isPast = Carbon::parse($conferences[$id]['date'])->lessThan(Carbon::today());
        if ($isPast) {
            return redirect()
                ->route('admin.conferences.index')
                ->with('error', __('app.flash.cannot_delete_past'));
        }

        unset($conferences[$id]);
        session()->put('conferences', $conferences);

        return redirect()
            ->route('admin.conferences.index')
            ->with('success', __('app.flash.conference_deleted'));
    }
}
