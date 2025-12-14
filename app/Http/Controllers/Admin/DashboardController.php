<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    private function currentUser(): array
    {
        return ['first_name' => 'Admin', 'last_name' => 'User'];
    }

    public function index()
    {
        return view('admin.dashboard', [
            'currentUser' => $this->currentUser(),
        ]);
    }
}
