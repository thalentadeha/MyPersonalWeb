<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\Portfolio;
use App\Models\Skill;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
    $dataPortfolio = Portfolio::all();
    $dataAboutMe = AboutMe::all();
    $dataSkill = Skill::all();

    return view('welcome', [
        'PortfolioList' => $dataPortfolio,
        'AboutMe' => $dataAboutMe,
        'skilldata' => $dataSkill,
    ]);
    }
}
