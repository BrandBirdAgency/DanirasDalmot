<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contactMail(Request $res)
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
    public function productMail(Request $res)
    {
        $res->validate(
            [
                'username'=> 'required',
                'address' => 'required',
                'phone' => 'required|digits_between:10,10|numeric',
                'email' => 'required|email',
            ]
            );
         // Storing In DB
         $order = new Order();
         $order->name = $res->username;
         $order->phone = $res->phone;
         $order->address = $res ->address;
         $order -> email = $res -> email;
         $order->product_id = $res -> product_id;
         $order->quantity = $res -> quantity;
         $order->price = $res -> price;
         $order -> save();
         //Sending Email
         Mail::send('email.ordermail',['data'=>$res], function ($m) use ($res) {
            $m->from('testmail9779@gmail.com', 'Tester');;
            $m->to('testmail9779@gmail.com', 'Test');
            $m->subject("New Order Recieved");
        });
        return redirect()->route('ordersucess');
    }
}
