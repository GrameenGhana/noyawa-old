@extends('layouts.docs')


@section('contents')
<h1>Upload Excel</h1>

<div class="alert alert-info">
    <center><p><strong>Excel File Structure : Sample</strong></p></center>   
<img alt="Excel Structure" src="{{{ asset('noyawa/assets/img/structure.PNG') }}}" style="width:100%;"/>
</div>

<!-- will be used to show any messages -->
@if (Session::has('msg') )
   <div class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   <p><strong>Success! </strong><br>{{ Session::get('msg') }}</p>
   </div>
@endif


@if($errors->any())
    <div class="alert alert-danger alert-dismissable">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <p><strong>Oh snap! </strong>{{implode('',$errors->all('<br> :message '))}}</p> 
    </div>
@endif


<br>
<form role="form"  method="post" action="noyawa/postexcel" enctype="multipart/form-data">
  <div class="form-group">
    <label for="file">Excel File</label>
    <input type="file" class="form-control" id="file" name="file" >
  </div>
 
{{ Form::token() }}
  <button type="submit" class="btn btn-success">Upload</button>
</form>

@endsection
