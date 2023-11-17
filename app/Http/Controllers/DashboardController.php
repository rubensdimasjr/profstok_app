<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login.index');
    }
}
