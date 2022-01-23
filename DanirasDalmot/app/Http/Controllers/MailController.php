<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\QueueMail;

class MailController extends Controller
{
    public function contactMail(ContactRequest $res)
    {
        $abt = About::first();

        $data = [
            'name' => $res->name,
            'email' => $res->email,
            'phone' => $res->phone,
            'message' => $res->message,
            'subject' => $res->subject,
            'type' => 'contact',
        ];

        Mail::to($abt->email)->queue(new QueueMail($data));

        return redirect('contact')->with('success', 'Thank you! Your message has been sent successfully. We\'ll contact you soon.');
    }

    public function productMail(OrderRequest $res)
    {
        $status = DB::transaction(function () use ($res) {
            // Storing In DB
            $order = new Order();
            $order->name = $res->name;
            $order->phone = $res->phone;
            $order->district = $res->district;
            $order->ward_no = $res->ward_no;
            $order->address = $res->address;
            $order->email = $res->email;
            $order->product_id = $res->product_id;
            $order->quantity = $res->quantity;
            $order->price = $res->price;
            $order->save();

            $abt = About::first();

            // To Daniras
            $data = [
                'subject' => 'New Order Received',
                'name' => $res->name,
                'email' => $res->email,
                'address' => $res->address,
                'phone' => $res->phone,
                'district' => $res->district,
                'ward_no' => $res->ward_no,
                'quantity' => $res->quantity,
                'product_id' => $res->product_id,
                'flag' => 0,
                'type' => 'order',
            ];

            Mail::to($abt->email)->queue(new QueueMail($data));

            // To Customer
            $data = [
                'subject' => 'Order Confirmed',
                'quantity' => $res->quantity,
                'product_id' => $res->product_id,
                'flag' => 1,
                'type' => 'order',
            ];

            Mail::to($res->email)->queue(new QueueMail($data));

            return true;
        });

        return !$status
            ? redirect()->back()->with('error', 'Oops! Sorry a error has occured')
            : redirect()->route('ordersucess');
    }
}
