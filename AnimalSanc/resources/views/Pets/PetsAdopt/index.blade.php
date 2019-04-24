<!-- index.blade.php -->

@extends('layouts.app')

@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <div class="container">
  <div class="well well-sm">
    <div id="view" class="btn-group">
        <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
        </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
            class="glyphicon glyphicon-th"></span>Grid</a>
    </div>
  <div id="products" class="row list-group">
      @foreach($pet_adopts as $petadopt)
        <div class="item  col-xs-4 col-md-3">
            <div class="thumbnail">
                <img class="group list-group-image" src="http://res.cloudinary.com/dnhwxgf8i/image/upload/c_scale,h_250,w_400/v1488011915/mockup3_kxxwfy.jpg" alt="" />
              <div class="category">
                <h5 class="category-name">Tables</h5>
              </div>
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        Pearl Galaxy</h4>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $2,100</p>
                        </div>
                        <div class="btn-group">
                          <div class="btn-group">
                            <a class="btn btn-success" href="http://www.jquery2dotnet.com">Adopt</a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
      @endforeach
      </div>
    </div>
  </div>
</div>
<div>
@endsection