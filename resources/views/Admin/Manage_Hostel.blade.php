@extends('Admin.master')
@section('content')
<div class="container-fluid">
    <br>
    <h1>Manage Hostels</h1>
    <br>
    <table  class="table table-hover" >
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Country</th>
        <th>State</th>
        <th>City</th>
        <th>Address</th>
        <th>Help_line</th>
        <th>Description</th>
        <th>Actions</th>
        </thead>
        @if($hostels)
        @foreach ($hostels as $hostel )
        <tbody>
            <tr>
                <td>{{$hostel->id}}</td>
                <td>{{$hostel->name}}</td>
                <td>{{$hostel->email}}</td>
                <td>{{$hostel->country}}</td>
                <td>{{$hostel->state}}</td>
                <td>{{$hostel->city}}</td>
                <td>{{$hostel->address}}</td>
                <td>{{$hostel->help_line}}</td>
                <td>{{$hostel->description}}</td>
                <td>
                    <a href="{{route('hostel_delete',$hostel->id)}}">
                        <input type="submit" class="btn btn-danger" value="Delete"  name="Delete">
                        </a>
                </td>
            </tr>
        </tbody>
        @endforeach
        @else
            no data found
        @endif
    </table>
</div>

@endsection
