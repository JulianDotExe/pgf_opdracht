<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserApprovedMail;
use App\Models\User;

class ApproveController extends Controller
{
    public function approveUser($userId)
    {
        // Haal de gebruiker op
        $user = User::find($userId);

        // Controleer of de gebruiker bestaat
        if ($user) {
            // Haal het e-mailadres van de beheerder op
            $adminEmail = User::where('role', 'admin')->value('email');

            // Controleer of het e-mailadres van de beheerder is gevonden
            if ($adminEmail) {
                // Stuur e-mail naar beheerder
                Mail::to($adminEmail)->send(new UserApprovedMail($user));

                // Voer verdere acties uit, bijvoorbeeld het bijwerken van de gebruikersstatus in de database
                $user->update(['approved' => true]);

                // Geef een melding terug of stuur door naar een andere pagina
                return redirect()->route('dashboard')->with('success', 'Gebruiker is goedgekeurd en een e-mail is verzonden.');
            } else {
                // Geef een melding terug als het e-mailadres van de beheerder niet is gevonden
                return redirect()->route('dashboard')->with('error', 'E-mailadres van de beheerder niet gevonden.');
            }
        } else {
            // Geef een melding terug of stuur door naar een andere pagina als de gebruiker niet gevonden wordt
            return redirect()->route('dashboard')->with('error', 'Gebruiker niet gevonden.');
        }
    }
}
