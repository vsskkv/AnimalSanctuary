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
@endsection