@extends('Hostel.master')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Details</h4>
        <form class="form-sample" method="post" action="{{route('update_details',$fetch->id)}}">
            @csrf
            {{method_field('PUT')}}
          <p class="card-description">
            Personal info
          </p>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label"> Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{$fetch->name}}" name="name">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email Address</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{$fetch->email}}" name="email">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-9">
                  <select class="form-control" name="country">
                    @foreach (App\Models\Country::All() as $conty )
                    <option value="{{$conty->id}}" @if($conty->id==$fetch->country) selected @endif>{{$conty->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">State</label>
                <div class="col-sm-9">
                    <select class="form-control" name="state">
                        @foreach (App\Models\State::All() as $state )
                        <option value="{{$state->id}}"  @if($state->id==$fetch->state) selected @endif>{{$state->name}}</option>
                        @endforeach
                      </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                    <select class="form-control" name="city">
                    @foreach (App\Models\City::all() as $city )
                    <option value="{{$city->id}}" @if($city->id==$fetch->city) selected @endif>{{$city->name}}</option>
                    @endforeach
                    </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                {{-- <label class="col-sm-3 col-form-label">Membership</label> --}}
                {{-- <div class="col-sm-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked>
                      Free
                    </label>
                  </div>
                </div> --}}
                {{-- <div class="col-sm-5">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
                      Professional
                    </label>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
          <p class="card-description">
            Address
          </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Address </label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="exampleTextarea1" rows="4"name="address">{{$fetch->address}}</textarea>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Help Line Number</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="help" value="{{$fetch->help_line}}">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="exampleTextarea1" rows="4"name="description">{{$fetch->description}}</textarea>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                {{-- <label class="col-sm-3 col-form-label">Postcode</label> --}}
                {{-- <div class="col-sm-9">
                  <input type="text" class="form-control" />
                </div> --}}
              </div>
            </div>
          </div>

          {{-- <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-9">
                  <select class="form-control">
                    <option>America</option>
                    <option>Italy</option>
                    <option>Russia</option>
                    <option>Britain</option>
                  </select>
                </div>
              </div>
            </div>

          </div> --}}

          <input type="submit" class="btn btn-primary mr-2" name="update" value="update">
        </form>

      </div>
    </div>
  </div>
@endsection
