<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function createRecord(Request $request)
    {
    $request->validate(
        [
            'name'=>'required|max:50',
            'position'=>'required|max:60',
            'phone'=>'required|numeric|between:0,10',
            'address'=>'required|max:30',
            'photo'=>'required|mimes:jpg,jpeg,png,bmp|max:10240',
        ]
    );
    $record=new Team();
    $record->name=$request->name;
    $record->position=$request->position;
    $record->phone=$request->phone;
    $record->address=$request->address;
    if ($request->file('photo') != null)
        $record->photo = $request->file('photo')->store('public/images');
    $record->facebook=$request->facebook;
    $record->instagram=$request->instagram;
    $record->save();
    return redirect('teampage');
     }
     public function deleteRecord($id)
    {
        $record = Team::find($id);
        $record->delete();
        return redirect('teampage');
    }
}
