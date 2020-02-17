<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class MyService extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'myservice';
  }
}