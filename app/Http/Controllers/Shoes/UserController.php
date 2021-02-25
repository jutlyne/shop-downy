<?php

namespace App\Http\Controllers\Shoes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\AdminUser;
use App\Model\Product;
use Auth;

class UserController extends Controller
{
    public function __construct(AdminUser $adminUser, Order $order){
      $this->adminUser = $adminUser;
      $this->order = $order;

    }
    public function index(){
      return view('shoes.user.index');
    }


}
