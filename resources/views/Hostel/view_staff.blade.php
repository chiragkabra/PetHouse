@extends('Hostel.master')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col">
        <h4 class="card-title">View Staff Details</h4>
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
                Role
                </th>
                <th>
                 Address
                </th>
                <th>
                   contact Number
                  </th>
                  <th>
                    Image
                  </th>
              </tr>
            </thead>
            @if($staff)
            @foreach ($staff as $fetch )
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
                  {{$fetch->role}}
                </td>
                <td>
                    {{$fetch->address}}
                  </td>
                  <td>
                    {{$fetch->contact_no}}
                  </td>
                  <td>
                    <img src="{{ asset('/staff_images/'.$fetch->image) }}" alt="no image uploaded" size="50px">
                  </td>

                  <td>
                      <a href="{{route('staff.edit',$fetch->id)}}">
                      <input type="submit" class="btn btn-primary" value="edit"  name="Edit">
                      </a>


                    <input type="submit" class="btn btn-danger" value="Delete"  name="Delete" data-toggle="modal" data-target="#exampleModal" data-id='{{$fetch->id}}'>

                    <!-- Modal -->
                    <form method="post" action="{{route('staff.destroy',$fetch->id)}}">
                        @csrf
                        {{method_field('delete')}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                    <h4>Are you sure u want to delete the entry</h4>
                                        <h4>with name:{{$fetch->name}}</h4>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete It! </button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
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

