@extends('layouts.app')

@section('content')

<body>
 <form method="GET" action = "sendnotification">
 	<!-- @method('put')
 	@csrf -->
  <div class="container">
   <div class="position-absolute top-50 start-50 translate-middle">
 	
 	<div class = "form-group" style="margin-left:400px; ">
     <label>{{ __( 'Subject' ) }} </label>
 	  <input type = "text" class="form-control" name="subject" value = "" required="">
    </div> 

  <br>

<div class="form-group" style="margin-left:400px;">
 <label for="exampleFormControlTextarea1"> {{ __( 'Message' ) }} </label> 
  <textarea class="form-control"  name = "message" value = "" id="exampleFormControlTextarea1" rows="4" maxlength="5000" required=""></textarea>
</div>

	<div class="form-group" style="margin-left:410px;">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
</div><br>

<div class="form-group">
 <button type="submit" class="text-green bg-dgrey" style="margin-left:500px;" name="send" onclick="myFunction()"><i>SEND</i></button>
</div>


</div>
</form>
</body>
<script>
function myFunction() {
  alert("Notification Send Successfully !");
}
</script>
@endsection