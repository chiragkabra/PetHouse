<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $req)
    {
        if($req->input('login'))
        {
            $req->validate([
                'email'=>'required|ends_with:@gmail.com,@yahoo.com',
                'password'=>'required',
            ]);
            $email=$req->input('email');
            $password=$req->input('password');
            $log=Register::where('email',$email)->first();
            if(!empty($log))
            {
                if(Hash::check($password, $log->password))
                {
                    if($log->role_id==1)
                    {
                         $req->session()->put('admin',$log);
                         return redirect()->route('dashboard');

                    }
                    elseif($log->role_id==2)
                    {
                         $req->session()->put('hostel',$log);
                         return redirect()->route('Hostel_dashboard');

                    }
                    elseif($log->role_id==3)
                    {
                        $req->session()->put('doctor',$log);
                        return redirect()->route('Doctor_dashboard');

                    }
                    // else
                    // {
                    //     $req->session()->put('user',$log);
                    //     return redirect()->route('create');
                    // }

                }
                else
                {
                    return redirect()->route('login')->with('error','passwords does not match');
                }

            }
            else
                {
                    return redirect()->route('login')->with('error','User does not exists');
                }
        }
    }

    public function logout(Request $req)
    {
        if($req->session()->has('admin'))
        {
            $req->session()->forget('admin');
            return redirect()->route('login');
        }
        elseif($req->session()->has('hostel'))
        {
            $req->session()->forget('hostel');
            return redirect()->route('login');
        }
        elseif($req->session()->has('doctor'))
        {
            $req->session()->forget('doctor');
            return redirect()->route('login');
        }

    }
}
