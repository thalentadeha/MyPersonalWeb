<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function starter(Request $request){
        return view('admin.admin');
    }

    public function dashboard(Request $request){
        return view('admin.dashboard');
    }
}
