<?php

namespace App\Http\Controllers;

use App\Models\PeopleModel;
use Illuminate\Http\Request;

class InputDataController extends Controller
{
    public function input()
    {
        return view('input');
    }
    public function upload(Request $request)
    {
        $firname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $gender = $request->input('gender');
        $age = $request->input('age');
        $address = $request->input('address');
        $image = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('public/images/', $image);

        $people = new PeopleModel;

        $people->first_name = $firname;
        $people->last_name = $lastname;
        $people->gender = $gender;
        $people->age = $age;
        $people->address = $address;
        $people->image = $image;
        $people->save();
        return redirect()->back();
    }
}
