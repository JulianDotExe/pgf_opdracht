<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewUserRegistered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class RequestUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function index()
    {
        return view('auth.request');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function requestAccount(Request $request)
    {
        $user = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        
        // Get all admin users
        $adminUsers = User::role('admin')->get();

        // Send email to each admin user
        foreach ($adminUsers as $adminUser) {
            Mail::to($adminUser->email)->send(new NewUserRegistered($user));
        }

        return back()->with('message', 'For ' . $user . ' Account requested');
    }

}