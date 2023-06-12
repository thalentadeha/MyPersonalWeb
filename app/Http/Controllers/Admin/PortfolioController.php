<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

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
        $data = Portfolio::with('categories')->get();
        // $data = Portfolio::all();
        // $cat = Portfolio::orderBy(Category::select('category_name')->whereColumn('id', 'portfolios.category_id'))->get();

        return view('admin.portfolios.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();

        return view('admin.portfolios.create', compact('data'));
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
            'image_file' => 'required|image',
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
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Portfolio::with('categories')->findOrFail($id);
        $category = Category::all();

        return view('admin.portfolios.edit', [
            'data' => $data,
            'category' => $category,
        ]);
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
            'image_file' => 'required|image',
            'portfolio_date' => 'required',
        ]);

        $editPortfolio = Portfolio::findOrFail($id);
        $editPortfolio->title = $request->title;
        $editPortfolio->description = $request->description;
        $editPortfolio->portfolio_date = $request->portfolio_date;
        $editPortfolio->category_id = $request->category_id;
        if ($request->hasFile('image_file')) {
            // delete old image
            File::delete($editPortfolio->image_file);

            // and store new image
            $imagePath = $request->file('image_file')->store('uploads', ['disk' => 'public']);
            $editPortfolio->image_file_url = $imagePath;
        }
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
