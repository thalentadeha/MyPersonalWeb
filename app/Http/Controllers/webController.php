<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webController extends Controller
{
    public function index(Request $request){
        return view('welcome');
    }

    public function admin(Request $request){
        return view('admin.admin');
    }
}
