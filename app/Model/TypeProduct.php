<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class TypeProduct extends Model
{
    protected $table = 'type_product';
    protected $primaryKey   = 'id_type_product';
    public function getItem()
    {
      return DB::table('type_product')
        ->paginate(4);
    }

    public function getProduct(){
      return DB::table('type_product')
      ->get();
    }

    public function getProductTypeID($id){
      return DB::table('typeproduct')
      ->where('id_type_product', $id)
      ->get();
    }


    public function addItem($data)
    {
      return DB::table('type_product')->insert([
        $data
      ]);
    }

    public function editItem($data, $id)
    {
      return DB::table('type_product')
      ->where('id_type_product', $id)
      ->update($data);
    }

    public function changeProduct($id, $data)
    {
      return DB::table('type_product')
      ->where('id_type_product', $id)
      ->update($data);
    }

    public function getItemProduct($id)
    {
      return $this->findOrFail($id);
    }
}
