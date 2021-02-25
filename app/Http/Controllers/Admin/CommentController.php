<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Comment;
use App\Model\AdminUser;

class CommentController extends Controller
{
    public function __construct(Product $product, Comment $comment, AdminUser $adminUser){
      $this->product = $product;
      $this->comment = $comment;
      $this->adminUser = $adminUser;

    }
    public function index(){
      $comment = $this->comment->getAllCmt();
      $isAdmin = $this->adminUser->isAdmin();
      return view('admin.comment.index',compact('comment', 'isAdmin'));
    }
    public function delete($id){
      $cmt = $this->comment->delCmt($id);
      return response()->json([
          'success' => 'Xoá thành công'
      ]);
    }
}
