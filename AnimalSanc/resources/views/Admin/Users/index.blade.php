<!-- index.blade.php -->

@extends('layouts.app')

@section('css')
   
@endsection()

@section('content')
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>USERS TABLE</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Username</td>
          <td>isAdmin</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->isAdmin}}</td>
            <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
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