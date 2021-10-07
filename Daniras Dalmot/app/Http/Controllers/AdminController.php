<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
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
}
