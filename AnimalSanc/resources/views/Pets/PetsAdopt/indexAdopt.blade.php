

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
            <td>{{$petadopt->pet_id}}</td>
            <td>{{$petadopt->user_id}}</td>
            <td>
            @if($petadopt->status == 0)
            <span class="label label-primary">Pending</span>
            @elseif($petadopt->status == 1)
            <span class="label label-success">Approved</span>
            @elseif($petadopt->status == 2)
            <span class="label label-danger">Rejected</span>
            @else
            <span class="label label-info">Postponed</span>
            @endif
            </td>
            <td><a href="{{action('PetAdoptController@edit', $petadopt->id)}}" class="btn btn-warning">Moderate</a></td>
            </tr>
        @endforeach
    </tbody>
  </table>
<div>
  
@endsection