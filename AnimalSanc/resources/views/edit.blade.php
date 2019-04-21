<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="card uper">
  <div class="card-header">
    Edit user
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
      <form method="post" action="{{ route('users.update', $user->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">first name:</label>
              <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}"/>
          </div>
          <div class="form-group">
              <label for="price">last name :</label>
              <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}"/>
          </div>
          <div class="form-group">
              <label for="price">username :</label>
              <input type="text" class="form-control" name="username" value="{{$user->username}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">isAdmin :</label>
              <input type="text" class="form-control" name="isAdmin" value="{{$user->isAdmin}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update User</button>
      </form>
  </div>
</div>
@endsection