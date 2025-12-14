<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private function toArrayUser(User $u): array
    {
        return [
            'id' => $u->id,
            'first_name' => $u->first_name,
            'last_name' => $u->last_name,
            'email' => $u->email,
        ];
    }

    public function index()
    {
        $users = User::query()
            ->orderBy('id')
            ->get()
            ->map(fn (User $u) => $this->toArrayUser($u))
            ->values()
            ->all();

        return view('admin.users.index', compact('users'));
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', ['user' => $this->toArrayUser($user)]);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', __('app.flash.user_updated'));
    }
}
