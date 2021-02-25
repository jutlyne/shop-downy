<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminUser extends Model
{
    protected $table = 'users';
    protected $primaryKey   = 'id';
    public function getUser()
    {
      return DB::table('users')->orderBy('id','desc')->paginate(4);
    }

    // public function firstUserById($userId)
    // {
    //   return DB::table($this->table)->where('id', $userId)->first();
    // }

    public function addUser($data)
    {

        return DB::table('users')->insert([
          $data
        ]);

    }

    public function editUser($data, $id)
    {
      return DB::table('users')
      ->where('id', $id)
      ->update($data);
    }

    public function delUser($id)
    {
      return DB::table('users')
      ->where('id', $id)
      ->delete();
    }

    public function isAdmin()
    {
      $user = Auth::user();
      if($user && $user->permission == "admin") {
        return true;
      }
      return false;
    }

    public function getUserItem($id)
    {
      return $this->findOrFail($id);
    }
}
