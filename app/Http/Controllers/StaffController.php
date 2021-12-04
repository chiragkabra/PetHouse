<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\File;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Hostel.staff');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff=Staff::all();
        return view('Hostel.view_staff',compact('staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if($req->input('submit'))
        {
            $staff= new Staff();
            if($req->has('image'))
            {
                $profile=$req->image;
                $name=$profile->getClientOriginalName();
                $path='staff_images/';
                $profile->move($path,$name);
                $staff->image=$name;
           }
            $staff->name=$req->input('name');
            $staff->email=$req->input('email');
            $staff->role=$req->input('role');
            $staff->address=$req->input('address');
            $staff->contact_no=$req->input('phone');
            $staff->save();
            return redirect()->back()->with('success','inserted successfully');


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $staff=Staff::find($id);
       return view('Hostel.editstaff',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $staff= new Staff();
        if($req->input('update'))
        {
            $staff=Staff::find($id);
            if($req->hasfile('image'))
            {
                $profile=$req->image;
                $name=$profile->getClientOriginalName();
                $path='staff_images';
                $profile->move($path,$name);
                $staff->image=$name;
            }
            $staff->name=$req->input('name');
            $staff->email=$req->input('email');
            $staff->role=$req->input('role');
            $staff->address=$req->input('address');
            $staff->contact_no=$req->input('phone');
            $staff->save();
            return redirect()->route('staff.create')->with('success','updated successfully');
        }
        else
        {
            $staff->name=$req->input('name');
            $staff->email=$req->input('email');
            $staff->role=$req->input('role');
            $staff->address=$req->input('address');
            $staff->contact_no=$req->input('phone');
            $staff->save();
            return redirect()->route('staff.create')->with('success','updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff=Staff::find($id);
        $image_path = "staff_images/{$staff->image}";
        if(File::exists($image_path))
        {
            unlink($image_path);
        }
        $staff->delete();
        return redirect()->back()->with('error','Entry Deleted');
    }
}
