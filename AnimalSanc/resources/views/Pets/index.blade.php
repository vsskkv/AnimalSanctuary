<!-- index.blade.php -->

@extends('layouts.app')

@section('css')
<link href="{{ asset('css/Pets.css') }}" rel="stylesheet" type="text/css">
@endsection

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
            <a href="{{url('allPets/create')}}" class="btn btn-primary">New</a>
        </div>
        <h1>All pets</h1>
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
  @else
  <div class="wrapper">
  <div class="desc">
    <h1>All Pets</h1>

  </div>

  <div class="content">
    <!-- content here -->
    <div class="product-grid product-grid--flexbox">
      <div class="product-grid__wrapper">
        <!-- Product list start here -->
        @foreach($pets as $image)
        <!-- Single product -->
        <div class="product-grid__product-wrapper">
          <div class="product-grid__product">
            <div class="product-grid__img-wrapper">     
                                      <img class="card-img-top"
                             src="{{url($image->image? 'uploads/'.$image->image:'images/noimage.jpg')}}"
                             alt="{{$image->description}}" width="100px" height="180px"/>
            </div>
            <span class="product-grid__title">{{ucwords($image->name)}}</span>
            <span class="product-grid__price">{{ucwords($image->type)}}</span>
            <div class="product-grid__extend-wrapper">
              <div class="product-grid__extend">
                <p class="product-grid__description">{{ucwords($image->description)}}</p>
                <span class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i>                    
                    <?php 
                      $id = DB::table('pet_adopts')->insertGetId(
                          ['pet_id' => $image->id, 'user_id' => Auth::user()->id]
                      );
                    ?>Adopt</span>        
                <span class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i> View more</span>
              </div>
            </div>
          </div>
        </div>
        <!-- end Single product -->
        @endforeach
      </div>    
    </div>
  </div>
</div>
@endif
</div>
@endsection