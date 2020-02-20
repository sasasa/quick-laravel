<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Events\SkillEvent;

class SkillUserController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        // DB::enableQueryLog();
        // dd(DB::getQueryLog());
        return view('skilluser.create', $this->preparationVariables($user));
        
    }

    public function store(Request $req)
    {
        $user = Auth::user();
        //スキルの登録
        $user->skillSet($req->skills);
        event(new SkillEvent($user->skillNames(), $user));
        
        
        // イベント発行してリスナーが対処する
        return view('skilluser.create', $this->preparationVariables($user));
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

    private function preparationVariables($user)
    {
        $skills = Skill::all();
        return [
            'skills' => $skills,
            'skillsGroupByType' => $skills->groupBy('type'),
            'skillsGroupByTypeForSelect' => $skills->skillsGroupByTypeForSelect(),
            'userskillids' => $user->skillIds(),
        ];
    }
}
