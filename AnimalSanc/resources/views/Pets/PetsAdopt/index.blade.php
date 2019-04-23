<!-- index.blade.php -->

@extends('layouts.app')

@section('content')

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
          <td>pet</td>
          <td>user</td>
          <td>accpeted</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pet_adopts as $petadopt)
        <tr>
            <td>{{$petadopt->id}}</td>
            <td>{{$petadopt->book_name}}</td>
            <td>{{$petadopt->isbn_no}}</td>
            <td>{{$petadopt->book_price}}</td>
            <td><a href="{{ route('pet_adopts.edit',$petadopt->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('pet_adopts.destroy', $petadopt->id)}}" method="post">
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