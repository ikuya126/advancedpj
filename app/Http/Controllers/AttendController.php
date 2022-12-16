<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('attendance', ['user' => $user]);
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
                return redirect()->back()->with('successMessage', '既に出勤中です');
            }
        }

        Attendance::create([
            'user_id' => $user->id,
            'work_start' => Carbon::now(),
            'date' => new Carbon('today')
        ]);

        return redirect()->back()->with('successMessage', '出勤開始');
    }
        
    public function end()
    {
        $user = Auth::user();
        $attend = Attendance::where('user_id', $user->id)->latest()->first();

        if( !empty($attend->work_end)) {
            return redirect()->back()->with('successMessage', '既に退勤しているか、まだ出勤していません');
        }
        $attend->update([
            'work_end' => Carbon::now()
        ]);

        return redirect()->back()->with('successMessage', '退勤完了、お疲れさまでした');
    }

    

    
}
