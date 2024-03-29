<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutMe;
use App\Models\Portfolio;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataPortfolio = Portfolio::with('categories')->get();
        $dataAboutMe = AboutMe::all();
        $dataSkill = Skill::all();

        return view('admin.admin', [
        'PortfolioList' => $dataPortfolio,
        'AboutMe' => $dataAboutMe,
        'skilldata' => $dataSkill,
    ]);
    }

    public function starter(Request $request){
        return view('admin.admin');
    }
}
