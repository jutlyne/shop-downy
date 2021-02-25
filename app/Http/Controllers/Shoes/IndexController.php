<?php

namespace App\Http\Controllers\Shoes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TypeProduct;
use App\Model\AdminUser;
use Auth;

class IndexController extends Controller
{
    public function __construct(TypeProduct $typeproduct, AdminUser $adminUser){
      $this->typeproduct = $typeproduct;
      $this->adminUser = $adminUser;

    }
    public function Index(){
      $item = $this->typeproduct->getItem();
      $isAdmin = $this->adminUser->isAdmin();
      if(isset(Auth::user()->username)){
        return view('shoes.index.index', compact('item', 'isAdmin'));
      }else{
        return view('shoes.index.index', compact('item'));
      }
    }
}
