@extends('layouts.app')

@section('content')


<table id="checkStatusTable">
        <tr>
       
          <th>Room</th>
          <th>Room Type</th>
          <th>Room Description</th>
          <th>Rating</th>
        </tr>
        
    
            @php 
            
                
                $ownedRoom = json_decode($ownedRoom, true);
               
    
                foreach($ownedRoom as $room) {
                    echo "<tr>";
                        echo "<td>";
                        echo $room['room_name'];
                        echo "</td>";
                        echo "<td>";
                        echo $room['room_type'];
                        echo "</td>";
                        echo "<td>";
                        echo $room['description'];
                        echo "</td>";
                        echo "<td>";
                        echo "<button class=\"button button5\"><a href=\"rate1\"><span style=\"color:white\">1</span></a></button>";
                        echo "<button class=\"button button5\"><a href=\"rate2\"><span style=\"color:white\">2</span></a></button>";
                        echo "<button class=\"button button5\"><a href=\"rate3\"><span style=\"color:white\">3</span></a></button>";
                        echo "<button class=\"button button5\"><a href=\"rate4\"><span style=\"color:white\">4</span></a></button>";
                        echo "<button class=\"button button5\"><a href=\"rate5\"><span style=\"color:white\">5</span></a></button>";
                      
                        echo "</td>";

                    echo "<tr>";
                }
    
    
                
              @endphp
    
      </table>
    
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
    
    
    

@endsection
