<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('skills.index', [
            'skills' => Skill::with('users')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create', [
            'skill_types' => Skill::TYPES,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Skill::$rulesCreate);
        $skill = new Skill;
        $skill->fill($request->all())->save();
        return redirect('skills')
        ->with('store', "スキルID：". $skill->id. 'を作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit', [
            'skill_types' => Skill::TYPES,
            'skill' => $skill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $this->validate($request, Skill::$rulesUpdate);
        // nameの重複チェック自分のnameはのぞいてチェックする
        $request->validate([
            'name' => [Rule::unique('skills', 'name')->whereNot('name', $skill->name)]
        ]);
        $skill->fill($request->all())->save();
        return redirect('skills')
        ->with('update', "スキルID：". $skill->id. 'を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect('skills')
        ->with('destroy', "スキルID：". $skill->id. 'を削除しました。');
    }
}
