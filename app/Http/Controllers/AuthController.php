<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function ShowLogin()
    {
        return view("login");
    }

    public function ShowRegister()
    {
        return view("register");
    }

    public function RegisterUser(Request $request)
    {
        $validated = $request->validate(
            [
                "name" => "required|string|max:255",
                "email" => "required|email|unique:users",
                "password" => "required|string|min:8|confirmed",
            ]
            );

            $users = User::create($validated);
            Auth::login($users);

            return redirect("/");
    }

    public function LoginUser(Request $request)
    {
        $validated = $request->validate([
            "name"=> "required|string",
            "password" => "required|string"
        ]);

        if(Auth::attempt($validated))
        {
            $request->session()->regenerate();
            return redirect("/");
        }

        throw ValidationException::withMessages([
            "credentials"=> "Incorret Credentials"
        ]);
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();  
        $request->session()->regenerate();
        return redirect("/login");
    }
}
