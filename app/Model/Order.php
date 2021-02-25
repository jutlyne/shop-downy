<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use App\Model\TypeProduct;
use App\Model\Util;
use DB;

class Order extends Model
{
    protected $table = 'order_product';
    protected $primaryKey   = 'id';

    public function getOrder(){
      return DB::table('order_product')
      ->get();
    }

    public function getOrderProduct($id){
      return DB::table('order_product')
      ->select('product_json')
      ->where('id', $id)
      ->first();
    }

    public function getOrderProductUser($id){
      return DB::table('order_product')
      ->select('product_json')
      ->where('id_user', $id)
      ->first();
    }

    public function getByIds($ids) {
      return DB::table('product')
      ->whereIn('id_product', $ids)
      ->get();
    }

    public function insertByArray($data)
    {
      $result =  DB::table('order_product')->insert($data);
      return $result;
    }

    public function showOrder($id){
      return DB::table('order_product')
      ->where('id', $id)
      ->get();
    }

    public function change($data, $id){
      return DB::table('order_product')
      ->where('id', $id)
      ->update($data);
    }

    public function showdev($id){
      return DB::table('order_product')
      ->where('id', $id)
      ->first();
    }

    public function getItemOrder($id)
    {
      return $this->findOrFail($id);
    }
}
