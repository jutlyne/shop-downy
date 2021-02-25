<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use App\Model\TypeProduct;
use App\Model\Util;
use DB;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey   = 'id_product';
    public function getItem()
    {
      return DB::table('product')
        ->paginate(9);
    }

    public function getAdminProduct(){
      return DB::table('product')
      ->join('type_product','product.id_type_product', '=', 'type_product.id_type_product')
      ->join('users','product.id_user', '=', 'users.id')
      ->select('product.*', 'type_product.name_type_product as tname', 'users.fullname as uname')
      ->paginate(4);
    }

    public function getIMG($id){

    }

    public function getItemID($id)
    {
      return DB::table('product')
        // ->join('picture_product','product.id_product', '=', 'picture_product.id_product')
        // ->select('product.*', 'picture_product.*')
        ->where('product.id_type_product', $id)
        ->paginate(9);
    }

    public function newOder($data){
      return DB::table('oder')
      ->insertGetId($data);
    }

    public function getProduct()
    {
      return DB::table('type_product')
      ->get();
    }

    public function removePic($id){
      return DB::table('picture')
      ->where('id_picture', $id)
      ->delete();
    }


    public function getIMGProduct($id){
      return DB::table('picture')
      ->where('id_product', $id)
      ->orderBy('id_picture', 'DESC')
      ->paginate(3);
    }

    public function getFeature()
    {
      return DB::table('product')
      ->orderBy('price_product', 'DESC')
      ->paginate(4);
    }

    public function addItemProduct($data)
    {
      return DB::table('product')->insertGetId(
        $data
      );
    }

    public function addPic($datapic){
      return DB::table('picture')->insert(
        $datapic
      );
    }

    public function editItemProduct($data, $id)
    {
      return DB::table('product')
      ->where('id_product', $id)
      ->update($data);
    }


    public function delItemProduct($id)
    {
      return DB::table('product')
      ->where('id_product', $id)
      ->delete();
    }

    public function addStar($datastar){
      {
        return DB::table('stars')->insert(
          $datastar
        );
      }
    }

    public function updateStar($id, $data){
      $vote = $data['number_vote'];
      return DB::table('stars')
      ->where('id_product', $id)
      ->update($data);
    }

    public function getItemProduct($id)
    {
      return $this->findOrFail($id);
    }

    public function getItemProductByArray($ids)
    {
      return DB::table('product')
      ->select('product.*')
      ->whereIn('id_product', $ids)
      ->orderBy('id_product', 'DESC')
      ->get();
    }



    public function listProduct()
    {
       return $this->beLongsTo(TypeProduct::class, 'id_type_product', 'id_type_product');
    }

    public function search($key){
      return DB::table('product')
      ->where('name_product','LIKE','%'. $key .'%')
      ->get();
    }

    public function searchcat($key){
      return DB::table('product')
      ->where('name_product','LIKE','%'. $key .'%')
      ->get();
    }
}
