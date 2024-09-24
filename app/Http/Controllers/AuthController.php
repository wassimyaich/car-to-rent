<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLogin()
    {
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            if (Auth::attempt($request->only('email', 'password'))) {
                // return redirect()->intended('dashboard'); // Redirect to intended page
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            //throw $th;
        }
        

       
    }

    public function showRegister()
    {
        return redirect()->route('home');
    }

    public function register(Request $request)
    {
        try {
            Log::info('you login request', $request->all());
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return redirect()->route('login')->with('success', 'Registration successful. Please log in.');

            
        } catch (\Exception $e) {
            
            Log::error($e->getMessage(), $request->all());
        }
       

    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home')->with('status', 'You have been logged out.');
    }
}
