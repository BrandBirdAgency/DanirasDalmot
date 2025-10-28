<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\About;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CeoMessageRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        $abt = About::first();
        return view('admin.profile', compact('abt'));
    }

    public function profileEdit(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|min:10',
            'website' => 'required',
        ]);

        $abt = About::first();

        $abt->name = $req->name;
        $abt->email = $req->email;
        $abt->phone = $req->phone;
        $abt->address = $req->address;
        $abt->website = $req->website;
        $abt->facebook = $req->fb;
        $abt->instagram = $req->insta;
        $abt->twitter = $req->tw;

        if ($req->hasFile('logo')) {
            if (file_exists(ltrim($abt->logo, '/'))) {
                unlink(ltrim($abt->logo, '/'));
            }
            $imageName = 'logo' . time() . '.' . $req->file('logo')->extension();
            $req->file('logo')->storeAs('public/images/logo', $imageName);
            $abt->logo = '/storage/images/logo/' . $imageName;
        }

        $abt->save();

        return redirect()->back()->with('success', "Company profile edited");
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
        $orders = Order::join('products', 'orders.product_id', '=', 'products.id')->select('orders.*', 'products.name as productname', 'products.price as productprice')->paginate(5);
        return view('admin.orders', compact('orders'));
    }
    public function orderStatus($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = 1;
            $order->save();
        }

        return redirect()->route('orders');
    }

    public function teams()
    {
        $teams = Team::all();
        return view('admin.teams', compact('teams'));
    }

    public function companyInfoEdit(CompanyRequest $req)
    {
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
    public function msg(CeoMessageRequest $req)
    {
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
