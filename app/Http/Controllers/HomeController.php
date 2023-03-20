<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    public function index (Home $home) {
        $homes = $home->getPostDate();
        return view('homes/index')->with(['homes' => $homes]);  
    }
    public function delete (Home $home) {
        $home->delete();
        return redirect('/home');  
    }
}
