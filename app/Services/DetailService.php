<?php

namespace App\Services;

use App\Model\Comment;

class DetailService
{
    public function __construct(Comment $commentModel){
      $this->commentModel = $commentModel;
    }

    public function insert($data)
    {
      $result = new $this->commentModel;
      foreach ($data as $key => $value) {
        $result->$key = $value;
      }
      $result->save();
      return $result;
    }
}
