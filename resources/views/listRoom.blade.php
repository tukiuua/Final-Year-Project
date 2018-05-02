@extends('layouts.app')

@section('content')

<h1> Add a room to an accomodation </h1>
<div id="listRoomForm">
  <form method="post" action="/listRoom/list" id="listRoomForm">
      {!! csrf_field() !!}
      Room Name:<br>
      <input type="text" name="roomName" required>
      <br><br>
      Room Type:<br>
      <input type="text" name="roomType" required>
      <br><br>
      Description:<br>
      <textarea name="description" form="listRoomForm" required>Enter text here...</textarea>
      <br><br>
      Price:<br>
      <input type="number" step="0.01" name="price" required>
      <br><br>
      Tenancy Length:<br>
      <input type="number" name="tenancyLength" required>
      <br><br>
      Start Date:<br>
      <input type="date" name="startDate" required>
      <br><br>
      Total Rooms:<br>
      <input type="number" name="totalRooms"  required >
      <br><br>
      Accomodation ID:<br>
      <input type="number" name="accommID" required>
      <br><br>
     
      <input type="checkbox" name="checkbox" value="confirmed" required>
      <label for="checkbox"><p>Please tick this box to confirm your selections</p></label>
     <br>
      <input id="submit" type="submit" value="Submit">
    </form> 
  </div>

  @if(Session::has('successMsg'))

        <div class="successMsg">
                <h2 style="color:white">{{Session::get('successMsg')}} </h2>
        </div>
@endif
  
  @endsection