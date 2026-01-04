<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FakeData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private function currentUser(): array
    {
        return ['first_name' => 'Admin', 'last_name' => 'User'];
    }

    public function index()
    {
        $users = FakeData::users();

        return view('admin.users.index', [
            'currentUser' => $this->currentUser(),
            'users' => $users,
        ]);
    }

    public function edit(int $id)
    {
        $users = FakeData::users();
        abort_if(!isset($users[$id]), 404);

        return view('admin.users.edit', [
            'currentUser' => $this->currentUser(),
            'user' => $users[$id],
        ]);
    }

    public function update(Request $request, int $id)
    {
        $users = FakeData::users();
        abort_if(!isset($users[$id]), 404);

        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        // Admin can edit first/last name (email kept read-only in UI, but validated)
        $users[$id]['first_name'] = $data['first_name'];
        $users[$id]['last_name'] = $data['last_name'];
        $users[$id]['email'] = $users[$id]['email']; // do not change email in SD1

        session()->put('users', $users);

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('app.flash.user_updated'));
    }
}
