<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if (auth()->user()->isAdmin == 1)
      <div class="container">
        <div class="float-right">
            <a href="{{url('laravel-crud-image-gallery/create')}}" class="btn btn-primary">New</a>
        </div>
        <h1 style="font-size: 2.2rem">All pets</h1>
        <hr/>
        <div class="row">
            @foreach($pets as $image)
                <div class="col-md-4 col-lg-3" style="margin-bottom: 20px">
                    <div class="card">
                        <img class="card-img-top"
                             src="{{url($image->image? 'uploads/'.$image->image:'images/noimage.jpg')}}"
                             alt="{{$image->description}}" width="100%" height="180px"/>
                        <div class="card-body">
                            <h6 class="card-title text-center">{{ucwords($image->description)}}</h6>
                            <h6 class="card-title text-center">{{ucwords($image->type)}}</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <form id="frm_{{$image->id}}"
                                      action="{{url('laravel-crud-image-gallery/delete/'.$image->id)}}"
                                      method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$image->id}}').submit()"
                                               class="btn btn-danger btn-sm btn-block">Delete</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="{{url('laravel-crud-image-gallery/update/'.$image->id)}}"
                                               class="btn btn-primary btn-sm btn-block">Edit</a>
                                        </div>
                                        <input type="hidden" name="_method" value="delete"/>
                                        {{csrf_field()}}
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
         <nav>
            <ul class="pagination justify-content-end">
                {{$pets->links('vendor.pagination.bootstrap-4')}}
            </ul>
        </nav>
    </div>
      @endif
  </div>
@endsection