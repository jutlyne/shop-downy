<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey   = 'id_contact';
    public function getContact()
    {
      return DB::table('contact')
      ->paginate(3);
        //->get();
    }

    public function getReply($id){
      return DB::table('contact')
      ->where('id_contact', $id)
      ->get();
    }

    public function addContact($data){
      return DB::table('contact')->insert([
        $data
      ]);
    }

    public function removeContact($id){
      return DB::table('contact')
      ->where('id_contact', $id)
      ->delete();
    }
}
