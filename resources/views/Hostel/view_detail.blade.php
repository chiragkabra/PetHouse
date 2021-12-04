@extends('Hostel.master')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col">
        <h4 class="card-title">View Hostel Details</h4>
        <x-alert></x-alert>
              </div>
              <a href="{{route('Hostel_dashboard')}}">
                <input type="submit" class="btn btn-primary mr-2 float-right" value="Back" name="Back">
                    </a>
        <p class="card-description">
           <code>

           </code>
        </p>
    </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                 ID
                </th>
                <th>
                  Name
                </th>
                <th>
                  Email
                </th>
                <th>
                 Country
                </th>
                <th>
                  State
                </th>
                <th>
                    City
                  </th>
                  <th>
                    Address
                  </th>
                  <th>
                    Help line
                  </th>
                  <th>
                  Description
                  </th>
                  <th>
                      Edit
                  </th>
              </tr>
            </thead>
            @if($fetch)
            @foreach ($fetch as $fetch )
            <tbody>
              <tr>
                <td>
                  {{$fetch->id}}
                </td>
                <td>
                 {{$fetch->name}}
                </td>
                <td>
                  {{$fetch->email}}
                </td>
                <td>
                  {{$fetch->country}}
                </td>
                <td>
                    {{$fetch->state}}
                  </td>
                  <td>
                    {{$fetch->city}}
                  </td>
                  <td>
                    {{$fetch->address}}
                  </td>
                  <td>
                    {{$fetch->help_line}}
                  </td>
                  <td>
                    {{$fetch->description}}
                  </td>
                  <td>
                      <a href="{{route('edit_details',$fetch->id)}}">
                      <input type="submit" class="btn btn-primary" value="edit"  name="Edit">
                      </a>
                  </td>
              </tr>
            </tbody>

            @endforeach
            @else
            No data
            @endif
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
