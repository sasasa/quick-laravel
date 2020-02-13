<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use DB;
use Illuminate\Support\Facades\Auth;

class SkillUserController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        // DB::enableQueryLog();
        return view('skilluser.create', [
            'skills' => Skill::all(),
            'userskillids' => $user->skillIds()
        ]);
        // dd(DB::getQueryLog());
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
    
}
