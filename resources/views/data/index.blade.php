@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Profile Picture</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Email Address</td>
          <td>Marks</td>
          <td>Status</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $datas)
        <tr>
            <td>{{$datas->id}}</td>
            <td> {{$datas->profile_picture}} </td>
            <td>{{$datas->first_name}}</td>
            <td>{{$datas->last_name}}</td>
            <td>{{$datas->email_address}}</td>
            <td>{{$datas->marks}}</td>
            <td>{{$datas->status}}</td>
            <td><a href="{{ route('data.edit',$datas->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('data.destroy', $datas->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection