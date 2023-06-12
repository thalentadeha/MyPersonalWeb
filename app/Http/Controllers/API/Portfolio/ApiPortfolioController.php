<?php

namespace App\Http\Controllers\API\Portfolio;

use App\Http\Requests\Portfolio\AddPortfolioRequest;
use App\Http\Requests\Portfolio\DeletePortfolioRequest;
use App\Http\Requests\Portfolio\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use function GuzzleHttp\Promise\all;

class ApiPortfolioController extends Controller
{
    public function index()
    {
        $data = Portfolio::all();

        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPortfolioRequest $request)
    {

        $imagePath = $request->file('image_file')->store('photo', ['disk' => 'public']);

        $newPortfolio = new Portfolio();
        $newPortfolio->title = $request->title;
        $newPortfolio->description = $request->description;
        $newPortfolio->category_id = $request->category_id;
        $newPortfolio->image_file_url = '/storage/' . $imagePath;
        $newPortfolio->portfolio_date = $request->portfolio_date;
        $newPortfolio->save();

        return response('add portfolio success');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, string $id)
    {
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

        return response('update portfolios success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeletePortfolioRequest $request, string $id)
    {
        $deletePortfolio = Portfolio::findOrFail($id);
        $deletePortfolio->delete();

        return response('delete portfolio success');
    }
}
