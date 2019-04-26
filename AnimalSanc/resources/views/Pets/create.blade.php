<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="card uper">
  <div class="card-header">
    Add Pet
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
      <form method="post" action="{{ route('pets.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price">Type:</label>
              <input type="text" class="form-control" name="type"/>
          </div>
          <div class="form-group">
              <label for="quantity">description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
<div class="avatar-upload col-12">
        <div class="avatar-edit">
            <input type='file' id="image" name="image" onchange="readURL(this);" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
            <img id="blah" src="https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png" class="" width="200" height="150"/>
        </div>
 
    </div>
    <div class="avatar-upload col-6">
    <button type="submit" class="btn btn-success">Submit</button>
    </div>
      </form>
  </div>
</div>

<script>
  function readURL(input, id) {
    id = id || '#blah';
    if (input.files &amp;&amp; input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }
</script> 
@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h1>{{isset($image)?'Edit':'New'}} Image</h1>
            <hr/>
            @if(isset($image))
                {!! Form::model($image,['method'=>'put','files'=>true]) !!}
            @else
                {!! Form::open(['files'=>true]) !!}
            @endif
            <div class="form-group row">
                {!! Form::label("image","Image",["class"=>"col-form-label col-md-3"]) !!}
                <div class="col-md-5">
                    <img id="preview"
                         src="{{asset((isset($image) && $image->image!='')?'uploads/'.$image->image:'images/noimage.jpg')}}"
                         height="200px" width="200px"/>
                    {!! Form::file("image",["class"=>"form-control","style"=>"display:none"]) !!}
                    <br/>
                    <a href="javascript:changeProfile();">Change</a> |
                    <a style="color: red" href="javascript:removeImage()">Remove</a>
                    <input type="hidden" style="display: none" value="0" name="remove" id="remove">
                </div>
            </div>
            <div class="form-group row required">
                {!! Form::label("description","Description",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("description",null,["class"=>"form-control".($errors->has('description')?" is-invalid":""),"autofocus",'placeholder'=>'Description']) !!}
                    {!! $errors->first('description','<span class="invalid-feedback">:message</span>') !!}
                </div>
                {!! Form::label("type","Type",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("type",null,["class"=>"form-control".($errors->has('type')?" is-invalid":""),"autofocus",'placeholder'=>'Type']) !!}
                    {!! $errors->first('type','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-4">
                    <a href="{{url('laravel-crud-image-gallery')}}" class="btn btn-danger">
                        Back</a>
                    {!! Form::button("Save",["type" => "submit","class"=>"btn
                btn-primary"])!!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script>
        function changeProfile() {
            $('#image').click();
        }
        $('#image').change(function () {
            var imgPath = $(this)[0].value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Please select image file (jpg, jpeg, png).")
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                    $('#remove').val(0);
                }
            }
        }
        function removeImage() {
            $('#preview').attr('src', '{{url('images/noimage.jpg')}}');
            $('#remove').val(1);
        }
    </script>
@endsection