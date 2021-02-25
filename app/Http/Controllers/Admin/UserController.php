<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Model\AdminUser;
use Auth;

class UserController extends Controller
{
  public function __construct(AdminUser $auser){
    $this->adminuser = $auser;
  }
  public function index(){
    $auser = $this->adminuser->getUser();
    $isAdmin = $this->adminuser->isAdmin();
    return view('admin.user.index',compact('auser','isAdmin'));
  }

  public function add(){
    return view('admin.user.add');
  }

  public function postAdd(UserRequest $request){
    //upload file
    //$path = $request->file('picture')->store('picture');

    $name = $request->username;
      $pass = $request->password;
      $fname = $request->fname;
      $pre = 'user';
      $data = ['username'=>$name, 'password'=>md5($pass), 'fullname'=>$fname, 'permission'=>$pre];
      $result = $this->adminuser->addUser($data);
      if($result){
        return redirect()
        ->route('admin.user.index');
      }else{
        return redirect()
        ->route('admin.user.index')
        ->with('msg','Error!!');
      }
  }

  public function delete($id, Request $request){
    $user = $this->adminuser->getUserItem($id);
    if($user->username == 'admin'){
      $request->session()->flash('msg', 'You can not delete admin');
      return redirect()
      ->route('admin.user.index');
    }
    if(Auth::user()->username != $user->username && Auth::user()->permission != 'admin'){
      $request->session()->flash('msg', 'You can not delete this type');
      return redirect()
      ->route('admin.user.index');
    }
    $result = $this->adminuser->delUser($id);
    return redirect()
    ->route('admin.user.index')
    ->with('msg','Thanh Cong');
  }

  public function edit($id, Request $request){
    $user = $this->adminuser->getUserItem($id);
    if(Auth::user()->username != $user->username && Auth::user()->permission != 'admin'){
      $request->session()->flash('msg', 'You can not edit this type');
      return redirect()
      ->route('admin.user.index');
    }
    $permission = Auth::user()->permission;
    return view('admin.user.edit',compact('id','user', 'permission'));
  }

  public function postEdit(Request $request, $id){
    $name = $request->username;
    $fname = $request->fname;
    $permission = $request->permission;
    if($request->password != ''){
      $password = $request->password;
      $pass = Hash::make($password);
      $data = ['username'=>$name, 'fullname'=>$fname, 'permission'=>$permission, 'password'=>$pass];
    }else{
      $data = ['username'=>$name, 'fullname'=>$fname, 'permission'=>$permission];
    }
    $result = $this->adminuser->editUser($data, $id);
    if($result){
      return redirect()
      ->route('admin.user.index');
    }else{
      return redirect()
      ->route('admin.user.index')
      ->with('msg','Error!!');
    }
  }
}
