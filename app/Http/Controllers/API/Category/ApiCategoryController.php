<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Requests\Category\AddCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use function GuzzleHttp\Promise\all;

class ApiCategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();

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
    public function store(AddCategoryRequest $request)
    {

        $newCategory = new Category();
        $newCategory->name =  $request->cat_name;
        $newCategory->save();

        return response('add category success');
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
    public function update(UpdateCategoryRequest $request, string $id)
    {

        $editCategory = Category::findOrFail($id);
        $editCategory->name = $request->cat_name;
        $editCategory->save();

        return response('update category success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCategoryRequest $request, string $id)
    {
        $deleteCategory = Category::findOrFail($id);
        $deleteCategory->delete();

        return response('delete category success');
    }
}
