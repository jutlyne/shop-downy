<?php

namespace App\Http\Controllers\Shoes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class LanguageController extends Controller
{
  public function index(Request $request,$language){
    if($language){
      Session::put('language',$language);
    }
    return redirect()->back();
  }
}
