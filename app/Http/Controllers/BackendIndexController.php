<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dak;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BackendIndexController extends Controller
{
    public function index()
    {


        if (Auth::user()->role_id == 1) {

            $adminDaks = Dak::all()->count();
            $users = User::where('role_id', 2)->count();

            return view('admin.index', compact('adminDaks', 'users'));
        } elseif (Auth::user()->role_id == 2) {

            $userDaks = Dak::where('user_id', Auth::id())
                ->count();
            return view('user.index', compact('userDaks'));
        }
        // elseif (Auth::user()->role_id == 3) {
        //     return view('user.index');
        // }

        return redirect()->route('login');
    }

    public function profile()
    {
        return view('admin.profile.profile');
    }

    public function profileUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email',
            'mobile' => 'required',
            'dob' => 'nullable|date_format:Y-m-d|before:today',
            'gender' => 'nullable|in:male,female',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',

        ]);

        $user = User::findOrFail($id);
        $data = $request->all();
        $data['email_verified_at'] = Carbon::now();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);
        return redirect('/admin/profile')->with('success', 'Your profile updated successfully.');
    }
}
