<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    //
    public function param(int $id = 1)
    {
        return 'id値:'. $id;
    }
    public function search(string $keywd = 'no')
    {
        return 'keywd値:'. $keywd;
    }
    public function info()
    {
        return "info";
    }
    public function article()
    {
        return "article";
    }
}
