@extends('Hostel.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <div class="row">
            <div class="col">
        <h4 class="card-title">Update Staff Details</h4>
            </div>
            <a href="{{route('staff.create')}}">
        <input type="submit" class="btn btn-primary mr-2 float-right" value="view detail" name="view_detail">
            </a>
        </div>

        <p class="card-description">
            <x-alert></x-alert>
        </p>
        <form class="forms-sample" method="post" action="{{route('staff.update',$staff->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control @error('name')
            @enderror" id="exampleInputName1" placeholder="Name" name="name" value="{{$staff->name}}">
            <br>
            @error('name')
            <div style="color:red;">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Email address</label>
            <input type="text" class="form-control @error('email')

            @enderror" id="exampleInputEmail3" placeholder="Email" name="email" value="{{$staff->email}}" >
            <br>
            @error('email')
            <div style="color:red;">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputEmail3">Role</label>
            <input type="text" class="form-control @error('role')

            @enderror" id="exampleInputEmail3" placeholder="role" name="role"  value="{{$staff->role}}">
            <br>
            @error('role')
            <div style="color:red;">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Address</label>
            <textarea class="form-control @error('address')
            @enderror" id="exampleTextarea1" rows="4"name="address">{{$staff->address}}</textarea>
            <br>
            @error('address')
            <div style="color:red;">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Phone Number</label>
            <input type="text" class="form-control @error('help') @enderror" id="exampleInputEmail3" placeholder="phone number" name="phone" value="{{$staff->contact_no}}">
            <br>
            @error('help')
            <div style="color:red;">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Staff Image</label>
            <input type="file" name="image" class="form-control @error('image') @enderror" >
            @error('image')
            <div style="color:red;">{{ $message }}</div>
            @enderror
            <br>
          <img src="{{asset('/staff_images/'.$staff->image)}}" alt="not uploaded" height="60px">
          </div>
          <input type="submit" class="btn btn-primary mr-2" name="update" value="update">
          {{-- <input class="btn btn-light" value="cancel" name="cancel"> --}}
        </form>
      </div>
    </div>
  </div>

@endsection
