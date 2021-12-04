@extends('Hostel.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <div class="row">
            <div class="col">
        <h4 class="card-title">Hostel Details</h4>
            </div>
            <a href="{{route('view_details')}}">
        <input type="submit" class="btn btn-primary mr-2 float-right" value="view detail" name="view_detail">
            </a>
        </div>

        <p class="card-description">
            <x-alert></x-alert>
        </p>
        <form class="forms-sample" method="post" action="{{route('Hostel_details')}}">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control @error('name')
            @enderror" id="exampleInputName1" placeholder="Name" name="name" value="{{$s->name}}">
            <br>
            @error('name')
            <div style="color:red;">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Email address</label>
            <input type="text" class="form-control @error('email')

            @enderror" id="exampleInputEmail3" placeholder="Email" name="email" value="{{$s->email}}">
            <br>
            @error('email')
            <div style="color:red;">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label>Country</label>
              <select class="form-control " name="country">
                    @foreach (App\Models\Country::All() as $conty )
                    <option value="{{$conty->id}}">{{$conty->name}}</option>
                    @endforeach
              </select>
            </div>
            <div class="form-group">
                <label >State</label>
                  <select  class=" form-control js-example-basic-single w-100" name="state">

                    @foreach (App\Models\State::All() as $state )
                    <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach

                  </select>
                </div>
            <div class="form-group">
                <label >City</label>
                  <select class="form-control js-example-basic-single w-100" name="city">
                    @foreach (App\Models\City::all() as $city )
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach


                  </select>
                </div>


          <div class="form-group">
            <label for="exampleTextarea1">Address</label>
            <textarea class="form-control @error('address')
            @enderror" id="exampleTextarea1" rows="4"name="address"></textarea>
            <br>
            @error('address')
            <div style="color:red;">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Help Line Number</label>
            <input type="text" class="form-control @error('help') @enderror" id="exampleInputEmail3" placeholder="helpline" name="help">
            <br>
            @error('help')
            <div style="color:red;">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control @error('description') @enderror" id="exampleTextarea1" rows="4" name="description"></textarea>
            @error('description')
            <div style="color:red;">{{ $message }}</div>
            @enderror
          </div>
          <input type="submit" class="btn btn-primary mr-2" name="submit" value="submit">
          {{-- <input class="btn btn-light" value="cancel" name="cancel"> --}}
        </form>
      </div>
    </div>
  </div>

@endsection
