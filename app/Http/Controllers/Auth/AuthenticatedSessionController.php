<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Add this line to import Auth

// toto mi pridalo lebo som chcela spravit ze ked sa prihlasis cez srdce v detail produktu tak sa vratis na presne hentu stranku ked sa prihlasis, ale asi to nie je take necessary, hlavne favorites mi nejdu

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
    
            // Presmerovanie na pôvodnú stránku alebo domovskú stránku
            return redirect()->intended($request->input('redirect', route('home')));
        }
    
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    
}
