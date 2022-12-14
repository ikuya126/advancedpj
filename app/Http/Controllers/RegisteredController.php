<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function create(Request $request)
    {
        
        $user_info = $request->validate([
            'name'  => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        return redirect('login');
    }
}