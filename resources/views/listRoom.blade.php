@extends('layouts.app')

@section('content')

<h1> Add a room to an accomodation </h1>

<form method="post" action="/listRoom/list" id="listRoomForm">
    {!! csrf_field() !!}
   Room Name:<br>
    <input type="text" name="roomName">
    <br><br>
    Room Type:<br>
    <input type="text" name="roomType" >
    <br><br>
    Description:<br>
    <textarea name="description" form="listRoomForm">Enter text here...</textarea>
    <br><br>
    Price:<br>
    <input type="number" step="0.01" name="price" >
    <br><br>
    Tenancy Length:<br>
    <input type="number" name="tenancyLength" >
    <br><br>
    Start Date:<br>
    <input type="date" name="startDate">
    <br><br>
    Total Rooms:<br>
    <input type="number" name="totalRooms" >
    <br><br>
    Accomodation ID:<br>
    <input type="number" name="accommID">
    <br><br>
    <div class="applyButton" >
        <input type="checkbox" name="checkbox" value="confirmed" required>
        <label for="checkbox"><p>Please tick this box to confirm your selections</p></label>
    </div>
    <input type="submit" value="Submit">
  </form> 

  @if(Session::has('successMsg'))

        <div class="successMsg">
                <h2 style="color:white">{{Session::get('successMsg')}} </h2>
        </div>
@endif
  
  @endsection