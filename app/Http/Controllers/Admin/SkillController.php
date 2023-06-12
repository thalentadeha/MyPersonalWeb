<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
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
        $data = Skill::all();

        return view('admin.aboutmes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.aboutmes.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'skill_name' => 'required',
            'skill_percent' => 'required',
        ]);

        $newSkill = new Skill();
        $newSkill->skill_name = $request->skill_name;
        $newSkill->skill_percent = $request->skill_percent;
        $newSkill->save();

        return redirect()->route('aboutmes.index');
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
        $data = Skill::findOrFail($id);

        return view('admin.aboutmes.skills.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'skill_name' => 'required',
            'skill_percent' => 'required',
        ]);

        $editSkill = Skill::findOrFail($id);
        $editSkill->skill_name = $request->skill_name;
        $editSkill->skill_percent = $request->skill_percent;
        $editSkill->save();

        return redirect()->route('aboutmes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteSkill = Skill::findOrFail($id);
        $deleteSkill->delete();

        return redirect()->route('aboutmes.index');
    }
}
