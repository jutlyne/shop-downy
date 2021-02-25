<?php

namespace App\Http\Controllers\Shoes;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Model\Contact;

class ContactController extends Controller
{

  public function __construct(Contact $contact){
    $this->contact = $contact;
  }

  public function contact(){
    return view('shoes.contact.contact');
  }

  public function postContact(Request $request){
    $name = $request->name;
    $email = $request->email;
    $phone = $request->telephone;
    $subject = $request->subject;
    $mes = $request->message;

    $data = [
      'name'=>$name,
      'email'=>$email,
      'subject'=>$subject,
      'messenge'=>$mes,
      'phone_number'=>$phone
    ];
    $result = $this->contact->addContact($data);
    if($result){
      return redirect()
      ->route('shoes.contact.contact')
      ->with('msg','Susses!!');
    }else{
      return redirect()
      ->route('shoes.contact.contact')
      ->with('msg','Error!!');
    }
  }
}
