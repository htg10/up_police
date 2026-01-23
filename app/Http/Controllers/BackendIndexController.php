<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendIndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            return view('superadmin.index');
        } elseif (Auth::user()->role_id == 2) {
            return view('admin.index');
        } elseif (Auth::user()->role_id == 3) {
            return view('user.index');
        }

        return redirect()->route('login');
    }
}
