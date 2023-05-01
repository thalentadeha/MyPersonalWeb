<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $data = Portfolio::all();

        return view('admin.portfolios.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image_file' => 'required',
            'portfolio_date' => 'required',
        ]);

        $imagePath = $request->file('image_file')->store('photo', ['disk' => 'public']);

        $newPortfolio = new Portfolio();
        $newPortfolio->title = $request->title;
        $newPortfolio->description = $request->description;
        $newPortfolio->category_id = $request->category_id;
        $newPortfolio->image_file_url = '/storage/' . $imagePath;
        $newPortfolio->portfolio_date = $request->portfolio_date;
        $newPortfolio->save();

        return redirect()->route('portfolios.index');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Portfolio::findOrFail($id);

        return view('admin.portfolios.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image_file' => 'required',
            'portfolio_date' => 'required',
        ]);

        $imagePath = $request->file('image_file')->store('photo', ['disk' => 'public']);

        $editPortfolio = Portfolio::findOrFail($id);
        $editPortfolio->title = $request->title;
        $editPortfolio->description = $request->description;
        $editPortfolio->portfolio_date = $request->portfolio_date;
        $editPortfolio->category_id = $request->category_id;
        $editPortfolio->image_file_url = '/storage/' . $imagePath;
        $editPortfolio->save();

        return redirect()->route('portfolios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletePortfolio = Portfolio::findOrFail($id);
        $deletePortfolio->delete();

        return redirect()->route('portfolios.index');
    }
}
