<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Count;
use App\Model\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mail;

class OrderController extends Controller
{
    public function __construct(Count $count, Order $order){
      $this->count = $count;
      $this->order = $order;
    }

    public function index(){
      $order = $this->order->getOrder();
      $count = $this->count->getCountOrder();
      return view('admin.order.index', compact('order', 'count'));
    }

    public function show($id){
      $order = $this->order->showOrder($id);
      $product = $this->order->getOrderProduct($id);
      $productIds = array();
      if ($product) {
        $productListJson = json_decode($product->product_json);
        foreach ($productListJson as $key => $value) {
          array_push($productIds, $value->id);
        }
        $products = $this->order->getByIds($productIds);
        foreach ($products as $key => $item) {
          $item->count = $productListJson[$key]->soluong;
        }
      }
      return view('admin.order.show', compact('order','products'));
    }

    public function changeIcon($id){
      $type = $this->order->getItemOrder($id);
      $prc = $type['status'];
      if($prc == 2){
        $data = [
          'status' => '0'
        ];
        $status = $this->order->change($data, $id);
        return response()->json([
            'btn' => '<i class="fa fa-check-circle"></i> SUCCESS'
        ]);
      }
    }

    public function delivery($id){
      $result = $this->order->showdev($id);
      $mail_to = $result->email;
      $fullname = $result->fullname;
      $data = [
        'header' => 'Your order has been approved',
        'comfirm' => 'We have confirmed your order',
        'msg' => 'Your order has been delivered, your order will be delivered to you within the next 5-7 days',
        'thank' => 'Thank you for your trust and purchase in our store',
        'footer' => 'Any questions please contact to email shoes-shop@gmail.com or call +84962199575'
      ];
      Mail::send('vendor.mail.index', $data, function($message) use($mail_to, $fullname){
        $message->to($mail_to, $fullname)->subject('Your order has been approved');
        $message->from('vocaoky290999@gmail.com', 'Shoes Shop');
      });

      $data = [
        'status' => 2,
      ];
      $status = $this->order->change($data, $id);
      return redirect()
      ->route('admin.order.index');
    }
}
