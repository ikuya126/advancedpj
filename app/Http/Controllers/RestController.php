<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RestController extends Controller
{
    public function start()
    {
        $user = Auth::user();

        $now = new Carbon();
        $today = $now->toDateString();

        $attend = Attendance::where('user_id', $user->id)->where('date', $today)->first();
        $id = $attend->user_id;


        Rest::create([
            'attendances_id' => $attend->user_id,
            'rest_start' => Carbon::now(),
            ]);

            return redirect()->back()->with('successMessage', '休憩開始');
    }

    public function end()
    {
        $user = Auth::user();

        $now = new Carbon();
        $today = $now->toDateString();

        $attend = Attendance::where('user_id', $user->id)->where('date', $today)->first();

        $rest = Rest::where('attendances_id', $attend->user_id);

        $empty = $rest->whereNull('rest_end')->first();
        
        Rest::where('attendances_id',$empty->attendances_id)->update(['rest_end'=> $now]);

        return redirect()->back()->with('successMessage', '休憩終了');
    }
}
