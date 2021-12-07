<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contactMail(Request $res)
    {
        $res->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
            ]
        );

        $abt = About::first();

        Mail::send('email.contactmail', ['data' => $res], function ($m) use ($res, $abt) {
            $m->from($res->email, $res->name);;
            $m->to($abt->email, $abt->name);
            $m->subject($res->subject);
        });

        return redirect('contact')->with('success', 'Thank you! Your message has been sent successfully. We\'ll contact you soon.');
    }

    public function productMail(Request $res)
    {
        $res->validate(
            [
                'username' => 'required',
                'address' => 'required',
                'phone' => 'required|min:10',
                'email' => 'required|email',
            ]
        );

        // Storing In DB
        $order = new Order();
        $order->name = $res->username;
        $order->phone = $res->phone;
        $order->address = $res->address;
        $order->email = $res->email;
        $order->product_id = $res->product_id;
        $order->quantity = $res->quantity;
        $order->price = $res->price;
        $order->save();

        $abt = About::first();

        //Sending Email
        Mail::send('email.ordermail', ['data' => $res], function ($m) use ($res, $abt) {
            $m->from($res->email, $res->name);
            $m->to($abt->email, $abt->name);
            $m->subject("New Order Received");
        });

        return redirect()->route('ordersucess');
    }
}
