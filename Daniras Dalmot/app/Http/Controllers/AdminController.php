<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Order;
use App\Models\Product;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function product()
    {
        $products = Product::paginate(9);
        return view('admin.product', compact('products'));
    }

    public function productadd()
    {
        return view('admin.addProduct');
    }

    public function orders()
    {
        $orders = Order::join('products','orders.product_id','=','products.id')->select('orders.*','products.name as productname')->paginate(5);
        return view('admin.orders',compact('orders'));
    }
    public function orderStatus($id)
    {
        Order::find($id)->status = 1;

        return redirect()->route('orders');

    }

    public function teams()
    {
        $teams = Team::all();
        return view('admin.teams', compact('teams'));
    }

    public function companyInfoEdit(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);

        $company = About::first();
        $company->name = $req->name;
        $company->address = $req->address;
        $company->phone = $req->phone;
        $company->email = $req->email;
        $company->website = $req->website;
        $company->facebook = $req->facebook ? $req->facebook : null;
        $company->instagram = $req->instagram ? $req->instagram : null;
        $company->twitter = $req->twitter ?  $req->twitter : null;
        $company->save();

        return redirect()->back()->with('success', 'Company Information Updated');
    }

    // Message from CEO/Chairman
    public function msg(Request $req)
    {
        $this->validate($req, [
            'ceoname' => 'string|required',
            'ceomsg' => 'string|required',
            'chairmanname' => 'string|required',
            'chairmanmsg' => 'string|required',
        ]);

        $company = About::first();
        $company->ceo_name = $req->ceoname;
        $company->ceo_msg = $req->ceomsg;
        if ($req->hasFile('ceoimg')) {
            if (file_exists(ltrim($company->ceo_photo, '/'))) {
                unlink(ltrim($company->ceo_photo, '/'));
            }
            $imageName = 'ceo.' . $req->file('ceoimg')->extension();
            $req->file('ceoimg')->storeAs('public/images', $imageName);
            $company->ceo_photo = '/storage/images/' . $imageName;
        }

        $company->chairman_name = $req->chairmanname;
        $company->chairman_msg = $req->chairmanmsg;
        if ($req->hasFile('chairmanimg')) {
            if (file_exists(ltrim($company->chairman_photo, '/'))) {
                unlink(ltrim($company->chairman_photo, '/'));
            }
            $imageName = 'chairman.' . $req->file('chairmanimg')->extension();
            $req->file('chairmanimg')->storeAs('public/images', $imageName);
            $company->chairman_photo = '/storage/images/' . $imageName;
        }

        $company->save();

        return redirect()->back()->with('success', 'Changes have been saved successfully!!');
    }
    
    public function orderUpdate(Request $req)
    {
        if ($req->ajax()) {
            $data = $req->all();
            if ($data['display'] == 1) {
                $data['display'] = 0;
            } else {
                $data['display'] = 1;
            }
            Order::where('id', $data['orderId'])->update(['status' => $data['display']]);
        }
    }

}
