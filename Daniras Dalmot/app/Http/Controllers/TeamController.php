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
                'name' => 'required|max:50',
                'position' => 'required|max:60',
                'phone' => 'required|numeric',
                'address' => 'required|max:30',
                'photo' => 'required|mimes:jpg,jpeg,png,bmp|max:10240',
            ]
        );
        $record = new Team();
        $record->name = $request->name;
        $record->position = $request->position;
        $record->phone = $request->phone;
        $record->address = $request->address;

        if ($request->hasFile('photo')) {
            $imageName = $request->name . time() . '.' . $request->file('photo')->extension();
            $request->file('photo')->storeAs('public/images/team', $imageName);
            $record->photo = '/storage/images/team/' . $imageName;
        }

        $record->facebook = $request->facebook;
        $record->instagram = $request->instagram;
        $record->save();
        return redirect()->back()->with('success', 'Team Member Added!!');
    }

    public function editRecord(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'pos' => 'required|max:60',
                'phn' => 'required|numeric',
                'add' => 'required|max:30',
            ]
        );

        $record = Team::find($id);
        $record->name = $request->name;
        $record->position = $request->pos;
        $record->phone = $request->phn;
        $record->address = $request->add;

        if ($request->hasFile('pic')) {
            if (file_exists(ltrim($record->photo, '/'))) {
                unlink(ltrim($record->photo, '/'));
            }
            $imageName = $request->name . time() . '.' . $request->file('pic')->extension();
            $request->file('pic')->storeAs('public/images/team', $imageName);
            $record->photo = '/storage/images/team/' . $imageName;
        }

        $record->facebook = $request->fb;
        $record->instagram = $request->insta;

        $record->save();

        return redirect()->back()->with('success', 'Team Member Updated!!');
    }

    public function deleteRecord($id)
    {
        $record = Team::find($id);
        if (file_exists(ltrim($record->photo, '/'))) {
            unlink(ltrim($record->photo, '/'));
        }
        $record->delete();

        return redirect()->back()->with('success', 'Team Member Deleted!!');
    }
}
