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
        $newDay = Carbon::today();

        $attend = Attendance::where('user_id', $user->id)->where('date', $today)->first();
        $id = $attend->user_id;


        Rest::create([
            'attendances_id' => $attend->user_id,
            'rest_start' => Carbon::now(),
            'date' => new Carbon('today')
            ]);

        $rest = Rest::where('attendances_id', $attend->user_id)->where('date', $newDay)->latest()->first();

        $rest_start = $rest->rest_start;

        return redirect()->back()->with('successMessage', '休憩開始')->with('rest_start',$rest_start);
    }

    public function end()
    {
        $user = Auth::user();

        $now = new Carbon();
        $today = $now->toDateString();

        $attend = Attendance::where('user_id', $user->id)->where('date', $today)->first();

        $rest = Rest::where('attendances_id', $attend->user_id)->whereNull('rest_end');
        
        $rest->update(['rest_end' => $now]);

        $restout = Rest::where('attendances_id', $attend->user_id)->where('date', $today)->first();

        $rest_end = $restout->rest_end;

        return redirect()->back()->with('successMessage', '休憩終了')->with('rest_end',$rest_end);
    }
}
