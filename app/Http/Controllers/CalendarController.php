<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Models\User;

class CalendarController extends Controller
{
    public function index () {
        return view('calendars/index');
    }
    
    public function plan (Request $request) {
        $year = $request['year'];
        $month = $request['month'];
        $date = $request['date'];
        return view('calendars/plan')->with(['year' => $year, 'month' => $month, 'date' => $date]);
    }
    
    public function schedule (Request $request) {dd($request);
        $year = $request['year'];
        $month = $request['month'];
        $date = $request['date'];
        return view('calendars/index')->with(['year' => $year, 'month' => $month, 'date' => $date]);
    }
    
    public function member (User $user, $member) {
        $member = $user->getSearchUser ($member);
        return response()->json($member);
    }
}
