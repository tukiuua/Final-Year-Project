@extends('layouts.app')
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
</head>

{{-- @if(Auth::check()) 
        {{Auth::user()->id}} 
@endif --}}

@SECTION('content')



<h1 class="applyText"> Select the accomodation you want to apply for </h1>
<br>
<form method="post" action="applyAccomodation/rooms/apply">
        {!! csrf_field() !!}
       <select name="accomodations" class="selectAccom" id="selectAccom" required>
                @foreach ($accomodations as $accom)
                <option value="{{$accom->id}}">{{$accom->accomodation_name}}</option>
                @endforeach
        </select>
       
        <br><br>
        <h1  class="applyText"> Select a room </h1>
        <br>
        <select name="room" class="selectAccom" id="selectRoom" required>
        </select>
        <br>
        <div class="applyButton" >
                <input type="checkbox" name="checkbox" value="confirmed" required>
                <label for="checkbox"><p>Please tick this box to confirm your selections</p></label>
        </div>

        <div class="applyButton">
                <button type="submit" id="applyButton">Apply Now!</button>
        </div>
</form>

@if(Session::has('successMsg'))

        <div class="successMsg">
                <h2 style="color:white">{{Session::get('successMsg')}} </h2>
        </div>
@endif

@if(Session::has('unsuccessMsg'))

        <div class="unsuccessMsg">
                <h2 style="color:white">{{Session::get('unsuccessMsg')}} </h2>
        </div>
@endif
      


<script>
//when page is ready run the function
$(document).ready(function(){
        //when drop down is changed, run the function
        $(document).on('change', '#selectAccom', function(){
                // obtain the value of the selected option
                var accomID = $(this).val();
                var op = " ";
                //obtain parent element i.e select
                var div = $(this).parent();
                $.ajax({
                        type: 'get',
                        url: 'applyAccomodation/' + accomID + '/rooms',
                        success: function(data){
                        for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].id+'">'+data[i].room_name+'</option>';
                        }
                        
                        div.find('#selectRoom').html(" ");
                        div.find('#selectRoom').append(op);   

                        },
                        error: function(){
                                console.log("ajax request was unsuccessful");
                        }
                });
        });
     
});

</script>
@endsection

