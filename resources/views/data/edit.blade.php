@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('data.update', $data->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">First Name:</label>
          <input type="text" class="form-control" name="first_name" value={{ $data->first_name }} />
        </div>
        <div class="form-group">
          <label for="price">Last Name :</label>
          <input type="text" class="form-control" name="last_name" value={{ $data->last_name }} />
        </div>
        <div class="form-group">
          <label for="quantity">Email Address :</label>
          <input type="text" class="form-control" name="email_address" value={{ $data->email_address }} />
        </div>
         <div class="form-group">
              <label for="quantity">Profile Picture :</label>
              <input type="file" class="form-control" name="profile_picture" accept="image/x-png,image/gif,image/jpeg"/>
          </div>
          <div class="form-group">
          <label for="quantity">Marks :</label>
          <input type="text" class="form-control" name="marks" value={{ $data->marks }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection