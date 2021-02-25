<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
use DB;

class Comment extends Model
{
    protected $table = 'reviews';
    protected $primaKey = 'id_review';
    public $timestamps = true;


    public function getAllCmt(){
      return DB::table('reviews')
      ->join('product','product.id_product', '=', 'reviews.id_product')
      ->select('reviews.*', 'product.name_product as pname')
      ->paginate(5);
    }

    public function addCMT($data)
    {
      return DB::table('reviews')->insert([
        $data
      ]);
    }

    public function delCmt($id)
    {
      return DB::table('reviews')
      ->where('id_review','=', $id)
      ->delete();
    }

    public function getCMT($id){
      return DB::table('reviews')
      ->where('id_product', $id)
      ->paginate(3);
    }

    public function getItemCmt($id)
    {
      return $this->findOrFail($id);
    }

}
