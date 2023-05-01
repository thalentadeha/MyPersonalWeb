<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function show(string $id)
    {
        $data = Portfolio::findOrFail($id);

        return view('portfolio', compact('data'));

        // return view('portfolio');
    }
}
