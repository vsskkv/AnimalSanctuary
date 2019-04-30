@extends('layouts.app') 

@section('content')

<div class=”container”> 
	@if(\Session::has('error')) 
	<div class=”alert alert-danger”> {{\Session::get('error')}} </div> 
	@endif <div class=”row”> 
		<div class=”col-md-8 col-md-offset-2"> 
			<div class=”panel panel-default”> 
				<div class=”panel-heading”>Dashboard</div>
				            @foreach($pets as $image)
				            @if($image->adopted == Auth::user()->id)
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
                                          <button>
                                          See more   
                                          </button>
                                        </div>

                                        {{csrf_field()}}
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
            @endforeach
			</div> 
		</div> 
	</div> 
</div> 

@endsection