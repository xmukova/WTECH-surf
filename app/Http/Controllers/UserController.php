<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller{
    public function register(Request $request)
    {
        // Validácia vstupných údajov
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'country' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Vytvorenie používateľa
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'password' => Hash::make($request->password),
        ]);

        // Prihlásenie používateľa po registrácii
        Auth::login($user);

        // Presmerovanie na domovskú stránku
        return redirect()->route('homepage');
    }


    public function login(Request $request)
    {
        // Validácia prihlasovacích údajov
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        // Pokus o prihlásenie
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('homepage');
        } else {
            return redirect()->route('login')
                ->withErrors(['email' => 'Invalid email or password'])
                ->withInput();
        }
    }


}
