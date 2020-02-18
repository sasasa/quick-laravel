<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ChunkController extends Controller
{
    public function chunk()
    {
        $msg = 'get: ';
        $result = [];
        User::orderBy('name', 'asc')->chunk(2, function($users) use (&$msg, &$result)
        {
            foreach($users as $user)
            {
                $msg .= $user->id. ', ';
                $result = array_merge($result, [$user]);
                break;
            }
            return true;
        });
        // dd($result);
        return view('chunk.chunk', [
            'msg'  => $msg,
            'data' => $result,
        ]);        
    }
    
    public function chunkById()
    {
        $msg = 'get: ';
        $result = [];
        User::chunkById(2, function($users) use (&$msg, &$result)
        {
            foreach($users as $user)
            {
                $msg .= $user->id. ', ';
                $result = array_merge($result, [$user]);
                break;
            }
            return true;
        });
        // dd($result);
        return view('chunk.chunkById', [
            'msg'  => $msg,
            'data' => $result,
        ]);
    }
}
