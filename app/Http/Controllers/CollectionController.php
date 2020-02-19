<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CollectionController extends Controller
{
    public function names()
    {
        dump(User::where('id', '>', 70)->get()->names());
        dd(User::select(['id', 'name'])->where('id', '>', 70)->get());
    }
    
    public function emails()
    {
        dump(User::where('id', '>', 50)->get()->emails());
        dd(User::select(['id', 'email'])->where('id', '>', 50)->get());
    }
}
