<?php

namespace App\Http\Controllers\Shoes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Services\RoomService;
use App\Model\Product;
use App\Model\TypeProduct;
use App\Model\Order;
use App\Model\Comment;
use App\Model\Count;
use App\Model\Star;
use Auth;

class NewController extends Controller
{
    protected $roomService;
    public function __construct(Order $orderModel, Product $product, TypeProduct $typeproduct, Comment $comment, Count $count, Star $star){
      $this->product = $product;
      $this->comment = $comment;
      $this->typeproduct = $typeproduct;
      $this->count = $count;
      $this->star  = $star;
      $this->orderModel = $orderModel;
    }

    public function index(){
      return view('shoes.shop.index');
    }

    public function checkout(){
      return view('shoes.checkout.index');
    }

    public function payment(){
      return view('shoes.checkout.payment');
    }

    public function postpayment(Request $request){
      $fullname = $request->fullname;
      $land = $request->land;
      $city = $request->city;
      $phone = $request->phone;
      $adtype = $request->adtype;

      $data = [
        'fullname' => $fullname,
        'phone_number' => $phone,
        'city' => $city,
        'adress' => $land,
        'adress_type' => $adtype
      ];
      $data = json_decode(json_encode($data), FALSE);
      return view('shoes.checkout.payment')
      ->with('data', $data);
    }

    public function about(){
      return view('shoes.shop.about');
    }

    public function cat(){

      $product = $this->product->getItem();
      //$roomType = $this->roomService->getListRoomType();
      return view('shoes.shop.cat')
      ->with('product', $product);
      //->with('roomType', $roomType);
    }
    public function detail($id){

      $product = $this->product->getItemProduct($id);
      $feature = $this->product->getFeature();
      $picture = $this->product->getIMGProduct($id);
      $comment = $this->comment->getCMT($id);
      $star    = $this->star->getVote($id);
      return view('shoes.shop.detail',compact('id','product', 'picture', 'feature', 'comment', 'star'));
    }

    public function star(Request $request, $id){
      $st = $request->st;
      $vote = $request->vote;
      $total = $request->total;
      $sum = $total + '1';
      $allvote = $vote + $st;
      $data = [
        'number_vote' => $allvote,
        'total_vote'  => $sum
      ];
      $result = $this->product->updateStar($id, $data);
      if($result){
        return response()->json([
            'success' => 'Success'
        ]);
      }else{
        return response()->json([
            'success' => 'Fail'
        ]);
      }
    }

    public function postAdd(Request $request){
      $name = $request->name;
      $email = $request->email;
      $pid  = $request->id;
      $review  = $request->message;
      $data = [
        'id_product'=>$pid,
        'name'=>$name,
        'email'=>$email,
        'review'=>$review,
        ];
      $result = $this->comment->addCMT($data);
      if($result){
        return response()->json([
            'success' => 'Success'
        ]);
      }
    }

    public function postcheckout(Request $request){
      $id = $request->ids;
      $soluong = $request->soluong;
      if (is_array($id)) {
        $product = $this->product->getItemProductByArray($id);
      }else{
        $product = $this->product->getItemProduct($id);
      }
      return response()->json($product);

      // return view('shoes.checkout.index')
      // ->with('product', $product);
    }

    public function addOrder(Request $request) {
      $data['fullname'] = $request->fullname;
      $data['phone']= $request->phone;
      $data['email']= $request->email;
      $data['address'] = $request->land;
      $data['address_type'] = $request->adtype;
      $data['city'] = $request->city;
      $data['product_json'] = $request->carts;
      $data['status'] = 1;
      if(isset(Auth::user()->id)){
        $data['id_user'] = Auth::user()->id;
      }
      $res = $this->orderModel->insertByArray($data);
      if ($res){
        return response()->json(array('success' => true, 'data' => $res));
      }else{
        return response()->json(array('success' => false, 'data' => []));
      }
    }
    // public function postStar(Request $request, $id){
    //   $star = $request->star;
    //   $total = $request->total;
    //   $data = [
    //     'number_vote' => $star,
    //     'total_vote' =>  $total,
    //   ];
    //   $result = $this->star->updateStar($data);
    //   if($result){
    //     return response()->json([
    //         'success' => 'Success'
    //     ]);
    //   }
    // }

    public function search($key){
      $output = "";
      $search = $this->product->searchcat($key);
      if($search != ""){
        foreach($search as $key => $value){
          $output .= '<div class="col-md-4 product-men">
            <div class="product-shoe-info shoe" style="height: 500px">
              <div class="men-pro-item">
                <div class="men-thumb-item">
                  <img src="http://localhost/shop/storage/app/'. $value->picture_product .'" alt="" height="350px">
                  <div class="men-cart-pro">
                    <div class="inner-men-cart-pro">
                      <a href="'. route('shoes.shop.detail', $value->id_product) .'" class="link-product-add-cart">Quick View</a>
                    </div>
                  </div>
                  <span class="product-new-top">New</span>
                </div>
                <div class="item-info-product">
                  <h4>
                    <a href="'. route('shoes.shop.detail', $value->id_product) .'">'. $value->name_product .'</a>
                  </h4>
                  <div class="info-product-price">
                    <div class="grid_meta">
                      <div class="product_price">
                        <div class="grid-price ">
                          <span class="money ">$'. $value->price_product .'.00</span>
                        </div>
                      </div>
                      <ul class="stars">
                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                      </ul>
                    </div>
                    <div class="shoe single-item hvr-outline-out">
                      <form action="#" method="post">
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="add" value="1">
                        <input type="hidden" name="shoe_item" value="Bella Toes">
                        <input type="hidden" name="amount" value="675.00">
                        <button type="submit" class="shoe-cart pshoe-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>

                        <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                      </form>

                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>';
        }
      }
      return response()->json(array('output' => $output));
    }

}
