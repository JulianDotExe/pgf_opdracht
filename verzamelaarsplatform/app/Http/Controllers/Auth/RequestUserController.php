<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewUserRegistered;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;


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
    public function store(Request $request): RedirectResponse
    {
        // Valideer de invoer

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Stuur een e-mail naar de beheerder
        $adminEmail = 'rikbalvers@outlook.com'; // Vervang dit door het e-mailadres van de beheerder
        Mail::to($adminEmail)->send(new NewUserRegistered($user));

        return back()->with('message', 'Account aangevraagd');
    }

}