<?php
namespace App\Http\Composers;

use Illuminate\View\View;

class HelloComposer
{
  public function compose(View $view)
  {
    $view->with('view_composer', 'this view is "'. $view->getName(). '"!');
  }
}