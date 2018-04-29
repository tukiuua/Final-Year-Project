@extends('layouts.app')
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
</head>

{{-- @if(Auth::check()) 
        {{Auth::user()->id}} 
@endif --}}

@SECTION('content')



<h1 class="applyText"> Select the accomodation in which you want to remove the room from</h1>
<br>
<form method="post" action="removeRoom/remove">
        {!! csrf_field() !!}
       <select name="accomodations" class="selectAccom" id="selectAccom2" required>
                @foreach ($accomodations as $accom)
                <option value="{{$accom->id}}">{{$accom->accomodation_name}}</option>
                @endforeach
        </select>
       
        <br><br>
        <h1  class="applyText"> Select the room you want to remove</h1>
        <br>
        <select name="room" class="selectAccom" id="selectRoom2" required>
        </select>
        <br>
        <div class="applyButton" >
                <input type="checkbox" name="checkbox" value="confirmed" required>
                <label for="checkbox"><p>Please tick this box to confirm your selections</p></label>
        </div>

        <div class="applyButton">
                <button type="submit" id="applyButton">Remove Room</button>
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
        $(document).on('change', '#selectAccom2', function(){
                // obtain the value of the selected option
                var accomID = $(this).val();
                var op = " ";
                //obtain parent element i.e select
                var div = $(this).parent();
                $.ajax({
                        type: 'get',
                        url: 'removeRoom/' + accomID + '/rooms',
                        success: function(data){
                        for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].id+'">'+data[i].room_name+'</option>';
                        }
                        
                        div.find('#selectRoom2').html(" ");
                        div.find('#selectRoom2').append(op);   

                        },
                        error: function(){
                                console.log("ajax request was unsuccessful");
                        }
                });
        });
     
});

</script>
@endsection

