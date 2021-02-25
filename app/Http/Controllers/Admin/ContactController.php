<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contact;
use Mail;
use Auth;

class ContactController extends Controller
{
    public function __construct(Contact $contact){
      $this->contact = $contact;
    }
    public function index(){
      $contact = $this->contact->getContact();
      return view('admin.contact.index',compact('contact'));
    }

    public function contact(){
      return view('shoes.contact.contact');
    }

    public function reply($id){
      $reply = $this->contact->getReply($id);
      $name = Auth::user()->fullname;
      return view('admin.contact.change', compact('reply', 'name'));
    }

    public function replyEmail(Request $request ,$id){
      $mail_to = $request->meo;
      $fullname = $request->name;
      $nameadmin = $request->nameadmin;
      $txt = $request->message;
      $data = [
        'header' => 'Reply email from ShoesShop',
        'form'   => $nameadmin,
        'thank'  => 'Thank you for contacting us',
        'msg'    => $txt,
        'footer' => 'Finally we would like to thank you for your mailing to us',
        'more'=> 'If you have any question please contact to email shoes-shop@gmail.com or call +84962199575'
      ];
      Mail::send('vendor.mail.contact', $data, function($message) use($mail_to, $fullname){
        $message->to($mail_to, $fullname)->subject('Reply email from ShoesShop');
        $message->from('vocaoky290999@gmail.com', 'Shoes Shop');
      });
      $this->contact->removeContact($id);
      return redirect()
      ->route('admin.contact.index');
    }


}
