<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
       $totalUsers = User::count();

       $latestUsers = User::latest()->take(10)->get();

        return view('users', compact('totalUsers', 'latestUsers'));
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|min:2|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role'     => 'client',
        ]);

        return redirect('/log');
    }

    public function showLoginForm()
    {
        return view('log');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect('/admin');
        } elseif ($user->role === 'client') {
            return redirect('/shop');
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'required',
            'password' => 'nullable|min:6|confirmed',
        ]);
    
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }
    
        if (!$user instanceof \Illuminate\Database\Eloquent\Model) {
            $user = \App\Models\User::find($user->id);
        }
    
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $user->save();
    
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}
