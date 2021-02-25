<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Count;
use App\Model\Contact;

class IndexController extends Controller
{
    public function __construct(Count $count, Contact $contact){
      $this->count = $count;
      $this->contact = $contact;
    }

    public function index(){
      $contact = $this->contact->getContact();
      $countproduct = $this->count->getCountProduct();
      $countcontact = $this->count->getCountContact();
      $countuser = $this->count->getCountUser();
      $counttype = $this->count->getCountTypeProduct();
      return view('admin.index.index', compact('contact', 'countproduct', 'countcontact', 'countuser', 'counttype'));
    }
}
