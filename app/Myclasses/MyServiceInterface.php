<?php
namespace App\MyClasses;

interface MyServiceInterface
{
  public function setId(int $id);
  public function say();
  public function allData();
  public function data(int $id);
}