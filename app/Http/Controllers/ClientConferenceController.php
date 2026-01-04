<?php

namespace App\Http\Controllers;

use App\Services\FakeData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ClientConferenceController extends Controller
{
    private function currentUser(): array
    {
        return ['first_name' => 'Client', 'last_name' => 'User'];
    }

    public function index()
    {
        $conferences = FakeData::conferences();

        // Client sees only planned conferences
        $today = Carbon::today();
        $planned = array_filter($conferences, function ($c) use ($today) {
            return Carbon::parse($c['date'])->greaterThanOrEqualTo($today);
        });

        return view('client.conferences.index', [
            'currentUser' => $this->currentUser(),
            'conferences' => $planned,
        ]);
    }

    public function show(int $id)
    {
        $conferences = FakeData::conferences();
        abort_if(!isset($conferences[$id]), 404);

        return view('client.conferences.show', [
            'currentUser' => $this->currentUser(),
            'conference' => $conferences[$id],
        ]);
    }

    public function register(Request $request, int $id)
    {
        $conferences = FakeData::conferences();
        abort_if(!isset($conferences[$id]), 404);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $registrations = FakeData::registrations();
        $registrations[$id] = $registrations[$id] ?? [];
        $registrations[$id][] = $data;

        session()->put('registrations', $registrations);

        return redirect()
            ->route('client.conferences.show', $id)
            ->with('success', __('app.flash.register_success'));
    }
}
