@extends('layouts.docs')


@section('contents')
<h1>Register Client</h1>

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
       <p><strong>Oh snap! </strong>{{implode('',$errors->all('<br> :message '))}} </p>
    </div>
@endif

<form role="form"  method="post" action="noyawa/postClient" autocomplete="on">
  <div class="form-group">
    <label for="client_number">Phone Number</label>
    <input type="phone" class="form-control" id="client_number" name="client_number" placeholder="eg. 233xxxxxxxx">
  </div>
  <div class="form-group">
    <label for="client_age">Age</label>
    <select class="form-control" id="client_age" name="client_age">
  <option value="">Select Age</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>

  </select>
   
  </div>
  
  <div class="form-group">
  <label for="client_gender">Gender</label>
  <select class="form-control" name="client_gender">
  <option value="">Select Gender</option>
  <option value="F">Female</option>
  <option value="M">Male</option>
  </select>
  </div>

   <div class="form-group">
  <label for="client_educational_level">Educational Level</label>
  <select class="form-control" name="client_educational_level">
  <option value="">Select Level</option>
  <option value="jhs">JHS</option>
  <option value="shs">SHS</option>
  <option value="ter">TERTIARY</option>
  <option value="n/a">N/A</option>
  </select>
  </div>

<div class="form-group">
        <label for="client_region">Region</label>
        <select class="form-control" id="client_region" name="client_region">
            <option value="">Select Region</option>
            <option value="Ashanti">Ashanti</option>
            <option value="Brong Ahafo">Brong Ahafo</option>
            <option value="Central">Central</option>
            <option value="Eastern">Eastern</option>
            <option value="Greater Accra">Greater Accra</option>
            <option value="Northern">Northern</option>
            <option value="Upper East">Upper East</option>
            <option value="Upper West">Upper West</option>
            <option value="Volta">Volta</option>
            <option value="Western">Western</option>

        </select>

    </div>

    <div class="form-group">
        <label for="client_location">Location</label>
        <input type="text" class="form-control" id="client_location" name="client_location" placeholder="">
    </div>

  <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection
