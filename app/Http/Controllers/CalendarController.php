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
    
    public function member (User $user, $member) {
<<<<<<< HEAD
        dd();
=======
>>>>>>> e0546c17c16c0b2498d339858229ee9991e040a4
        $member = $user->getSearchUser ($member);
        return response()->json($member);
    }
}
