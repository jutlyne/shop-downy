<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use App\Model\TypeProduct;

class ProductController extends Controller
{

  public function __construct(Product $product, TypeProduct $typeproduct){
    $this->product = $product;
    $this->typeproduct = $typeproduct;
  }

  public function index(){
    $listproduct = $this->product->getAdminProduct();
    return view('admin.product.index',compact('listproduct'));
  }

  public function add(){
    $typeproduct = $this->product->getProduct();
    return view('admin.product.add',compact('typeproduct'));
  }

  public function postAdd(Request $request){
    //upload file
    $path = $request->file('picture')->store('picture');
    $name = $request->nameproduct;
    $des  = $request->description;
    $info = $request->info;
    $id   = $request->typeproduct;
    $discount = $request->discount;
    $price = $request->price;
    $data = [
      'name_product'=>$name,
      'des_product'=>$des,
      'discount'=>$discount,
      'price_product'=>$price,
      'info_product'=>$info,
      'picture_product'=>$path,
      'id_type_product'=>$id,
      'id_user'=>1
      ];
    $id_product = $this->product->addItemProduct($data);
    if($id_product != ''){
      if($request->hasfile('gallery')){
        foreach($request->file('gallery') as $pic){
           $dpic = $pic->store('picture');
           $datapic = [
             'id_product' => $id_product,
             'url_picture' => $dpic
           ];
           $this->product->addPic($datapic);
        }
      }
    }
    $datastar = [
      'id_product' => $id_product,
      'number_vote' => '0',
      'total_vote' => '0'
    ];
    $this->product->addStar($datastar);
    if($id_product){
      return redirect()
      ->route('admin.product.index');
    }else{
      return redirect()
      ->route('admin.product.index')
      ->with('msg','Error!!');
    }
  }

  public function delete($id){
    $product = new Product;
    $Product = Product::find($id);
    $result = $Product->delItemProduct($id);
    $success = false;
    if ($result) {
      $msg = "Success";
      $success = true;
    }else{
      $msg = "Thất bại";
    }
    return response()->json(array('success' => $success, 'msg' => $msg));
  }

  public function remove($id){
    $this->product->removePic($id);
    return response()->json([
        'success' => 'Success'
    ]);
  }

  public function edit($id){
    $product = $this->product->getItemProduct($id);
    $typeproduct = $this->typeproduct->getProduct();
    $picture = $this->product->getIMGProduct($id);
    return view('admin.product.edit',compact('id','product', 'typeproduct', 'picture'));
  }

  public function postEdit(Request $request, $id){
    $name     = $request->nameproduct;
    $type     = $request->typeproduct;
    $discount = $request->discount;
    $price    = $request->price;
    $info     = $request->info;
    $description = $request->description;
    if($request->hasfile('picture')){
      $newpic = $pic->store('picture');
      if($request->hasfile('gallery')){
        $data = [
          'name_product' => $name,
          'discount'     => $discount,
          'price_product'=> $price,
          'des_product'  => $description,
          'info_product' => $info,
          'picture_product' => $newpic
        ];
        foreach($request->file('gallery') as $pic){
           $dpic = $pic->store('picture');
           $datapic = [
             'id_product' => $id,
             'url_picture' => $dpic
           ];
           $this->product->addPic($datapic);
        }
      }else{
        $data = [
          'name_product' => $name,
          'discount'     => $discount,
          'price_product'=> $price,
          'des_product'  => $description,
          'info_product' => $info,
          'picture_product' => $newpic
        ];
      }

    }else{
      if($request->hasfile('gallery')){
        $data = [
          'name_product' => $name,
          'discount'     => $discount,
          'price_product'=> $price,
          'des_product'  => $description,
          'info_product' => $info,
        ];
        foreach($request->file('gallery') as $pic){
           $dpic = $pic->store('picture');
           $datapic = [
             'id_product' => $id,
             'url_picture' => $dpic
           ];
           $this->product->addPic($datapic);
        }
      }else{
        $data = [
          'name_product' => $name,
          'discount'     => $discount,
          'price_product'=> $price,
          'des_product'  => $description,
          'info_product' => $info,
        ];
      }
    }
    $result = $this->product->editItemProduct($data, $id);
    if($result){
      return redirect()
      ->route('admin.product.index');
    }else{
      return redirect()
      ->route('admin.product.index');
    }
  }

  public function search($key){
    $output = "";
    $search = $this->product->search($key);
    if($search != ""){
      foreach($search as $key => $value){
        $output .= '<tr>
                    <td>' . $value->id_product . '</td>
                    <td>' . $value->name_product . '</td>
                    <td>' . $value->id_type_product . '</td>
                    <td>' . $value->discount . '</td>
                    <td>' . $value->price_product . '</td>
                    <td style="height: 10px; word-wrap: break-word;">' . $value->des_product . '</td>
                    <td style="height: 100px; word-wrap: break-word;"><img src="http://localhost/shop/storage/app/' . $value->picture_product . '" alt="" height="80px" width="100px"></td>
                    <td class="text-primary">
                      <a href="'.route('admin.product.edit', $value->id_product).'" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                      <a href="javascript:void(0)" data-id="'.$value->id_product.'" title="" class="btn btn-danger btn-remove-room-js" data-token="{{ csrf_token() }}"><i class="fa fa-pencil"></i> Xóa</a>
                    </td>
                    </tr>';
      }
    }
    return response()->json(array('output' => $output));
  }
}
