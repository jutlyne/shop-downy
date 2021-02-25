<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomTypeRequest;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use App\Model\TypeProduct;
use App\Model\AdminUser;


class TypeProductController extends Controller
{
  public function __construct(TypeProduct $typeproduct, AdminUser $adminUser){
    $this->typeproduct = $typeproduct;
    $this->adminUser = $adminUser;
  }

  public function index(){
    $listtypeproduct = $this->typeproduct->getItem();
    $isAdmin = $this->adminUser->isAdmin();
    return view('admin.typeproduct.index',compact('listtypeproduct','isAdmin'));
  }

  public function add(){
    return view('admin.typeproduct.add');
  }

  public function postAdd(Request $request){
    //upload file
    $path = $request->file('pic1')->store('picture');
    $path2 = $request->file('pic2')->store('picture');
    $name = $request->nametype;
    $des = $request->description;
    $data = [
      'name_type_product'=>$name,
      'des_type'=>$des,
      'picture'=>$path,
      'picture_2'=>$path2
    ];
    $result = $this->typeproduct->addItem($data);
    if($result){
      return redirect()
      ->route('admin.typeproduct.index');
    }else{
      return redirect()
      ->route('admin.typeproduct.index')
      ->with('msg','Error!!');
    }
  }

  public function change($id){
    $type = $this->typeproduct->getItemProduct($id);
    $prc = $type['status'];
    if($prc == 1){
      $data = [
        'status' => '0'
      ];
      $this->typeproduct->changeProduct($id, $data);
      return response()->json([
          'eyes' => '<i class="fa fa-eye-slash"></i> Show'
      ]);
    }else{
      $data = [
        'status' => '1'
      ];
      $this->typeproduct->changeProduct($id, $data);
      return response()->json([
          'eyes' => '<i class="fa fa-eye"></i> Hide'
      ]);
    }

  }

  public function edit($id){
    //lay loai phong hien tai
    $typeproduct = $this->typeproduct->getItemProduct($id);
    return view('admin.typeproduct.edit',compact('id','typeproduct'));
  }

  public function postEdit(Request $request, $id){
    $name = $request->nametype;
    $des  = $request->description;
    $data = [
      'name_type_product'=>$name,
      'des_type'=>$des
    ];
    $result = $this->typeproduct->editItem($data, $id);
    if($result){
      return redirect()
      ->route('admin.typeproduct.index');
    }else{
      return redirect()
      ->route('admin.typeproduct.index')
      ->with('msg','Error!!');
    }
  }
}
