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
          <form method="post" action="{{url('form')}}" enctype="multipart/form-data">
            {{csrf_field()}}

                  <div class="input-group control-group increment" >
                    <input type="file" name="filename[]" class="form-control">
                    <div class="input-group-btn"> 
                      <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

            </form> 
        <button type="submit" class="btn btn-primary">Create Pet</button>
      </form>
  </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
@endsection