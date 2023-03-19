<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    public function index (Home $home) {
        $homes = $home->get();
        return view('homes/index')->with(['homes' => $homes]);  
    }
}
