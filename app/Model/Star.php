<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
use DB;

class Star extends Model
{
  public function getVote($id)
  {
    return DB::table('stars')
    ->where('stars.id_product',$id)
    ->get();
  }

  public function updateStar($data){
    return DB::table('stars')->update([
      $data
    ]);
  }

  public function listStar()
  {
     return $this->beLongsTo(Product::class, 'id_product', 'id_product');
  }
}
