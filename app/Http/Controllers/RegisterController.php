<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function store(Request $req)
    {

        if($req->input('register'))
        {
            $req->validate([
                'name'=>'required',
                'email'=>'required|ends_with:@gmail.com,@yahoo.com|unique:registers',
                'password'=>['required',Password::min(8)->letters()->mixedcase()->numbers()->symbols()],
                'image'=>'required'
            ]);
            $register= new Register();
            if($req->has('image'))
        {
            $profile=$req->image;
            $name=$profile->getClientOriginalName();
            $path='profile_images/';
            $profile->move($path,$name);
            $register->image=$name;
       }

            $register->name=$req->input('name');
            $register->email=$req->input('email');
            $register->password=Hash::make($req->input('password'));
            $register->role_id=$req->input('role');
            $register->save();
            return redirect()->route('login');

        }


    }
}
