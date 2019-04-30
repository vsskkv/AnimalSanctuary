<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

  </head>
  <body>
    <div class="container">
      <form method="post" action="{{action('PetAdoptController@update', $id)}}">
        @csrf
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable>Approval</lable>
                <select name="approve">
                  <option value="0" @if($pet_adopt->status==0)selected @endif>Pending</option>
                  <option value="1" @if($pet_adopt->status==1)selected
                    <?php 
                    DB::table('pets')
                      ->where('id', $pet_adopt->pet_id)
                      ->update(['adopted' => $pet_adopt->user_id]);
                    ?>
                   @endif>Approve</option>
                  <option value="2" @if($pet_adopt->status==2)selected @endif>Reject</option>
                  <option value="3" @if($pet_adopt->status==3)selected @endif>Postponed</option> 
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-top:40px">Update</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>