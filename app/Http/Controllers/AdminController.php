<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;
class AdminController extends Controller
{
    public function index(Request $req)
    {
        if($req->session()->has('admin'))
        {
        return view('Admin.dashboard');
        }
        else
        {
            return redirect()->route('login')->with('error','please login first to go to dashboard');
        }
    }
    public function Manage_hostel(Request $req)
    {
        $hostels=Hostel::All();
        return view('Admin.Manage_Hostel',compact('hostels'));
    }
    public function hostel_delete(Request $req,$id)
    {
        Hostel::find($id)->delete();
        return redirect()->back()->
    }
}
