<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;
use Illuminate\support\Facades\DB;

class HostelController extends Controller
{
    public function index(Request $req)
    {
     return view ('Hostel.dashboard');

    }
    public function Hostel_detail(Request $req)
    {

        $s=session()->get('hostel');
        if($req->input('submit'))
        {
            $req->validate([
                'name'=>'required|alpha',
                'email'=>'required|ends_with:@gmail.com,@yahoo.com|unique:hostels',
                'country'=>'required',
                'state'=>'required',
                'city'=>'required',
                'address'=>'required',
                'help'=>'required|numeric',
                'description'=>'required'
            ]);
            $hostel= new Hostel();
           $hostel->name=$s->name;
            $hostel->email=$s->email;
            $hostel->country=$req->input('country');
            $hostel->state=$req->input('state');
            $hostel->city=$req->input('city');
            $hostel->address=$req->input('address');
            $hostel->help_line=$req->input('help');
            $hostel->description=$req->input('description');
            $hostel->save();
            return redirect()->back()->with('success','inserted successfully');
        }
        return view('Hostel.hostel_detail',compact('s'));
    }


    public function view_detail(Request $req)
    {
        if($req->session()->has('hostel'))
        {
            $s=session()->get('hostel');
            $fetch=DB::select('select * from hostels where email = ?', [$s->email]);

        }
        else
        {
            return redirect()->route('login')->with('error','Login first to perform action');
        }
        return view('Hostel.view_detail',compact('fetch'));
    }

    public function Edit_Detail(Request $req,$id)
    {
        $fetch=Hostel::find($id);
        return view('Hostel.edithostel_detail',compact('fetch'));
    }
    public function update_details(Request $req ,$id)
    {

        if($req->input('update'))
        {
            // $req->validate([
            //     'name'=>'required|alpha',
            //     'email'=>'required|ends_with:@gmail.com,@yahoo.com|unique:hostels',
            //     'country'=>'required',
            //     'state'=>'required',
            //     'city'=>'required',
            //     'address'=>'required',
            //     'help'=>'required|numeric',
            //     'description'=>'required'
            // ]);
            $hostel= Hostel::find($id);
            $hostel->name=$req->input('name');
            $hostel->email=$req->input('email');
            $hostel->country=$req->input('country');
            $hostel->state=$req->input('state');
            $hostel->city=$req->input('city');
            $hostel->address=$req->input('address');
            $hostel->help_line=$req->input('help');
            $hostel->description=$req->input('description');
            $hostel->save();
            return redirect()->route('view_details')->with('success','updated successfully');
        }
    }

    public function Delete_account(Request $req,$email)
    {
         $s=session()->get('hostel');
         $hostel=Hostel::where('email',$s->email)->delete();
         return redirect()->route('create')->with('success','create an account to join');

    }
}
