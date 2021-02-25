<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\AdminUser;
use Hash;

class AuthController extends Controller
{
    public function __construct(AdminUser $auser){
      $this->adminuser = $auser;
    }

    public function login(){
      return view('auth.auth.login');
    }

    public function regis(){
      return view('auth.auth.regis');
    }

    public function postregis(Request $request){
      $password = $request->password;
      $fullname = $request->fullname;
      $username = $request->username;
      $email    = $request->email;
      $permission = 'guest';
      $pass = Hash::make($password);
      $data = [
        'username' => $username,
        'password' => $pass,
        'fullname' => $fullname,
        'email'    => $email,
        'permission' => $permission
      ];
      $result = $this->adminuser->addUser($data);
      if($result){
        return redirect()->route('auth.auth.login')->with('msg','Created Successfully');
      }
    }

    public function postLogin(Request $request){
      $username = $request->username;
      $password = $request->password;
      if(Auth::attempt(['username'=>$username, 'password'=>$password])){
        if(Auth::user()->permission == 'admin' || Auth::user()->permission == 'user'){
          return redirect()->route('admin.index.index');
        }else{
          return redirect()->route('shoes.index.index');
        }
      }else{
        return redirect()->route('auth.auth.login')->with('msg','Sai username or password');
      }
    }


    public function logout(){
      Auth::logout();
      return redirect()->route('auth.auth.login');
    }
}
