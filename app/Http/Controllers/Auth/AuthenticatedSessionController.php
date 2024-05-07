<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Doctor;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $userr = User::where("email" , $request->email)->value("id");

        $doctors = Doctor::where("user_id" , $userr)->get();

        $votes = DB::table('doctor_vote')
        ->select('doctor_id', DB::raw('AVG(vote_id) as voteRating'))
        ->groupBy('doctor_id') // Aggiungi un raggruppamento per ottenere la media per ogni dottore
        ->orderBy('doctor_id')
        ->get();

        $votesArray = $votes->mapWithKeys(function ($item) {
            return [$item->doctor_id => $item->voteRating];
        })->all();
        
        // Unisci i risultati dei dottori con la media dei voti
        $doctorsWithVotes = $doctors->map(function ($doctor) use ($votesArray) {
            $doctor->voteRating = $votesArray[$doctor->id] ?? null;
            return $doctor;
        });


        // $request["user"] = $userr;
        // $request["doctor"] = $doctor;

        $doctor = $doctorsWithVotes->first();


        $request->session()->regenerate();
        session(['doctor' => $doctor]);
        session(['user' => $userr]);

        // $_SESSION["loggedDoctor"] = $doctor;

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('http://localhost:5174/');
    }
}
