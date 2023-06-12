<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Skill;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
    $dataPortfolio = Portfolio::with('categories')->get();
    $dataAboutMe = AboutMe::all();
    $dataSkill = Skill::all();
    $dataCategory = Category::all();

    return view('welcome', [
        'PortfolioList' => $dataPortfolio,
        'AboutMe' => $dataAboutMe,
        'skilldata' => $dataSkill,
        'cat_list' => $dataCategory,
    ]);
    }

    public function show(string $id)
    {
        $data = Portfolio::with('categories')->findOrFail($id);

        return view('portfolio', compact('data'));

        // return view('portfolio');
    }
}
