<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Count extends Model
{
    public function getCountProduct()
    {
      return DB::table('product')
      ->count();
    }

    public function getCountTypeProduct()
    {
      return DB::table('type_product')
      ->count();
    }

    public function getCountContact()
    {
      return DB::table('contact')
      ->count();
    }

    public function getCountOrder()
    {
      return DB::table('order_product')
      ->count();
    }

    public function getCountUser()
    {
      return DB::table('users')
      ->count();
    }

}
