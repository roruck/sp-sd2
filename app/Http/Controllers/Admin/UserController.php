<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private function currentUser(): array
    {
        $u = auth()->user();

        return [
            'first_name' => $u->first_name ?? '',
            'last_name' => $u->last_name ?? '',
        ];
    }

    public function index()
    {
        $users = User::query()->orderBy('id')->get();

        return view('admin.users.index', [
            'currentUser' => $this->currentUser(),
            'users' => $users,
        ]);
    }

    public function edit(int $id)
    {
        $user = User::query()->findOrFail($id);

        return view('admin.users.edit', [
            'currentUser' => $this->currentUser(),
            'user' => $user,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $user = User::query()->findOrFail($id);

        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
        ]);

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('app.flash.user_updated'));
    }
}
