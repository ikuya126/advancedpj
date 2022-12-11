<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('attendance', ['user' => $user]);
    }

    

    
}
