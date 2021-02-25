<?php

namespace App\Services;
use App\Model\Product;
use App\Model\TypeProduct;

class RoomService
{
    public function __construct(Product $product, TypeProduct $typeproduct){
      $this->product = $product;
      $this->typeproduct = $typeproduct;
    }

    // public function getListRoom()
    // {
    //   $result = $this->product;
    //   $result = $result->orderBy('created_at', 'DESC');
    //   $result = $result->paginate(3);
    //   return $result;
    // }
    //
    // public function getListRoomType()
    // {
    //   $result = $this->roomTypeModel;
    //   $result = $result->orderBy('type_id', 'DESC');
    //   $result = $result->get();
    //   return $result;
    // }
    //
    // public function del($id)
    // {
    //   return DB::table('rooms')
    //   ->where('rid', $id)
    //   ->delete();
    // }
}
