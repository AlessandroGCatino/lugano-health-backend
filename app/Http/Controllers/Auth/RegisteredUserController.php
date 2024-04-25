<?php


namespace App\Http\Controllers\Auth;

session_start();

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialization;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $specializations = Specialization::all();

        return view('auth.register', compact('specializations'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'regex:/^[0-9]+$/','max:10','min:10'],
            'specializations' => ['required', 'array'],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $doctor = Doctor::create([
            'name' => $request->firstname,
            'surname' => $request->lastname,
            'address' => $request->address,
            'user_id' => $user->id,
            'phone_number' => $request->phone_number,
        ]);

        $doctor->specialization()->attach($request->specializations);

        $logDoc = Doctor::where("user_id" , $user->id)->first();

        
        event(new Registered($user));
        
        Auth::login($user);
        
        session(['doctor' => $logDoc]);

        return redirect(RouteServiceProvider::HOME);
    }
}
