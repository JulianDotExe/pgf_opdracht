<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewUserRegistered;
use App\Mail\ErrorOccurred;
use App\Mail\NewUserRegisteredForUser;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;


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

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $adminRole = Role::where('name', 'admin')->first();

        if ($adminRole) {
            $adminUsers = $adminRole->users;

            // Send email to each admin user
            foreach ($adminUsers as $adminUser) {
                Mail::to($adminUser->email)->send(new NewUserRegistered($data));
            }

            Mail::to($data->email)->send(new NewUserRegisteredForUser($data));
        } else {
            // Notify the new user about the error
            Mail::to($data->email)->send(new ErrorOccurred($data));
            // Log it
            Log::warning("The 'admin' role doesn't exist. Please check the roles configuration.");
        }

        return redirect('/')->with('message', 'Account aangevraagd');
    }

}