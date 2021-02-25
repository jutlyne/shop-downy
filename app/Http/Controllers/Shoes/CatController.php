<?php

namespace App\Http\Controllers\Shoes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\TypeProduct;

class CatController extends Controller
{
    protected $roomService;
    public function __construct(Product $product, TypeProduct $typeproduct){
      $this->product = $product;
      $this->typeproduct = $typeproduct;
    }

    public function cat($id){
      $product = $this->product->getItemID($id);
      $typeproduct = $this->typeproduct->getProduct();
      return view('shoes.cat.cat')
      ->with('product', $product)
      ->with('typeproduct', $typeproduct);
    }

}
