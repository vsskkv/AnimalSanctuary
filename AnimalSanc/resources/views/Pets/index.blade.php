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
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>name</td>
          <td>type</td>
          <td>description</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pets as $pet)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->name}}</td>
            <td>{{$book->type}}</td>
            <td>{{$book->description}}</td>
            <td><a href="{{ route('pets.edit',$pet->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('pets.destroy', $pet->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @else
      <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="products-section container">
        <div class="sidebar">
            <h3>By Category</h3>
            <ul>
                @foreach ($categories as $category)
                    <li class="{{ setActiveCategory($category->slug) }}"><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div> <!-- end sidebar -->
        <div>
            <div class="products-header">
                <h1 class="stylish-heading">{{ $categoryName }}</h1>
                <div>
                    <strong>Price: </strong>
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>

                </div>
            </div>

            <div class="products text-center">
                @forelse ($Pets as $product)
                    <div class="product">
                        <a href="#"><img src="#" alt="product"></a>
                        <a href="#"><div class="product-name">{{ $product->name }}</div></a>
                        <div class="product-price">{{ $product->type }}</div>
                    </div>
                @empty
                    <div style="text-align: left">No items found</div>
                @endforelse
            </div> <!-- end products -->

            <div class="spacer"></div>
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div>

  <!--Other-->
  <div class="container">
    <div class="well well-sm">
      <div id="view" class="btn-group">
          <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"></span>List</a> 
          <a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Grid</a>
      </div>
    <div id="products" class="row list-group">
        @foreach($pets as $petadopt)
          <div class="item  col-xs-4 col-md-3">
              <div class="thumbnail">
                  <img class="group list-group-image" src="http://res.cloudinary.com/dnhwxgf8i/image/upload/c_scale,h_250,w_400/v1488011915/mockup3_kxxwfy.jpg" alt="" />
                <div class="category">
                  <h5 class="category-name">{{$petadopt->type}}</h5>
                </div>
                  <div class="caption">
                      <h4 class="group inner list-group-item-heading">
                          {{$petadopt->name}}</h4>
                      <div class="row">
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
  @endif
<div>
@endsection