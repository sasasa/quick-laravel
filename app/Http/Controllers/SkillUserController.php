<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use DB;
use Illuminate\Support\Facades\Auth;
use Arr;

class SkillUserController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        // DB::enableQueryLog();
        // dd(DB::getQueryLog());
        
        // dd(Skill::all()->groupBy(function($skill){
        //     return $skill->type;
        // }));
        // dd($ret);

        // $ret = [];
        // dd(
        //     Skill::all()->groupBy('type')->map(function($skill) use($ret){
        //         return $ret[$skill->type][strval($skill->id)] = $skill->name;
        //     })
        // );

        return view('skilluser.create', [
            'skills' => Skill::all(),
            'skillsGroupByType' => Skill::all()->groupBy('type'),
            'skillsGroupByTypeForSelect' => Skill::all()->mapToGroups(function($skill) {
                return [$skill->type => [$skill->id => $skill->name]];
            }),
            'userskillids' => $user->skillIds(),
        ]);
    }

    public function store(Request $req)
    {
        $user = Auth::user();
        //スキルの登録
        $user->skillSet($req->skills);
        
        return view('skilluser.create', [
            'skills' => Skill::all(),
            'userskillids' => $user->skillIds(),
        ]);
    }
    
    public function proficiency()
    {
        $user = Auth::user();
        return view('skilluser.proficiency', [
            'skills' => $user->skills()->get(),
        ]);
    }

    public function storeProficiency(Request $req)
    {
        $user = Auth::user();
        // dd($req->skills);
        foreach ($req->skills as $skillId => $proficiency)
        {
            $skill = $user->skills()->find($skillId);
            // dd($skill);
            // dd($proficiency);
            $skill->pivot->proficiency = $proficiency;
            $skill->pivot->save();
        }
        return redirect('proficiency');
    }
}
