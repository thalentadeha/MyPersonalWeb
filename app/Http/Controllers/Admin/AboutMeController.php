<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutMe;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutMeController extends Controller
{

    public function __construct()
     {
         $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AboutMe = AboutMe::all();
        $SkillData = Skill::all();

        return view('admin.aboutmes.index', [
            'aboutme' => $AboutMe,
            'skilldata' => $SkillData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = AboutMe::findOrFail($id);

        return view('admin.aboutmes.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'my_name' => 'required',
            'my_profile' => 'required',
            'my_email' => 'required',
            'my_number' => 'required',
            'photo_file' => 'required|image',
            'my_description' => 'required',
        ]);

        $editAboutMe = AboutMe::findOrFail($id);
        $editAboutMe->my_name = $request->my_name;
        $editAboutMe->my_profile = $request->my_profile;
        $editAboutMe->my_email = $request->my_email;
        $editAboutMe->my_number = $request->my_number;
        $editAboutMe->my_description = $request->my_description;
        if ($request->hasFile('photo_file')) {
            // delete old image
            File::delete($editAboutMe->photo_file_url);

            // and store new image
            $imagePath = $request->file('photo_file')->store('photo', ['disk' => 'public']);
            $editAboutMe->photo_file_url = $imagePath;
        }
        $editAboutMe->save();

        return redirect()->route('aboutmes.index');
    }

}
