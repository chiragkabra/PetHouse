<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $req)
    {
        if(!$req->session()->has('doctor'))
        {
            return redirect()->route('login')->with('error','please login first to go to dashboard');
        }
        else
        {
            return view('Doctor.dashboard');

        }


    }
}
