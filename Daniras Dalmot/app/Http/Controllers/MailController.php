<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contactmail(Request $res)
    {
        $res->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'subject'=>'required',
                'message'=>'required',
            ]
            );
        Mail::send('email.contactmail',['data'=>$res], function ($m) use ($res) {
            $m->from($res->email, $res->name);;
            $m->to('testmail9779@gmail.com', 'Test');
            $m->subject($res->subject);
        });
        return redirect('contact');
    }
    public function productmail(Request $res)
    {
        $res->validate(
            [
                'username'=> 'required',
                'Address' => 'required',
                'Phone' => 'required|digits_between:10,10|numeric',
            ]
            );
         Mail::send('email.ordermail',['data'=>$res], function ($m) use ($res) {
            $m->from('testmail9779@gmail.com', 'Tester');;
            $m->to('testmail9779@gmail.com', 'Test');
            $m->subject("New Order Recieved");
        });
        return redirect('products');
    }
}
