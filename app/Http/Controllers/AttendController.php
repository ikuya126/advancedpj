<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendController extends Controller
{
    public function index()
    {
        $user = User::all();
        $start = 1;
        $end = 0;
        $rest_start = 0;
        $rest_end = 0;

        return view('attendance', ['user' => $user,'start' => $start,'end' => $end,
        'rest_start' => $rest_start,'rest_end' => $rest_end]);
    }

    public function start()
    {
        $user = Auth::user();

        $newDay = Carbon::today();
        
        $oldDay = Attendance::where('user_id',$user->id)->latest()->first();
        if( !empty($oldDay)) {
            $oldDate = $oldDay->date;
            $newDate = $newDay->format('Y-m-d');
            if($oldDate == $newDate) {
                return redirect()->back()->with('successMessage', '既に出勤中しました');
            }
        }

        Attendance::create([
            'user_id' => $user->id,
            'work_start' => Carbon::now(),
            'date' => new Carbon('today')
        ]);

        $start = 0;
        $end = 0;
        $rest_start = 0;
        $rest_end = 0;

        return view('attendance',['start'=> $start,'end' => $end,'rest_end' => $rest_end,'rest_start' => $rest_start]);
    }
        
    public function end()
    {
        $user = Auth::user();
        $attend = Attendance::where('user_id', $user->id)->latest()->first();
        $newDay = Carbon::today();

        $attend->update([
            'work_end' => Carbon::now()
        ]);

        return redirect('/date');
    }

    

    
}
