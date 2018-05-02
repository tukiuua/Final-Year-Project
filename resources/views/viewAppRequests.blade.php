@extends('layouts.app')
<meta name="viewport" content="width=device-width, initial-scale=1">

@SECTION('content')

<table id="checkStatusTable">
    <tr>
      <th>Name</th>
      <th>Surname</th>
      <th>studentID</th>
      <th>Room ID</th>
      <th>Approved</th>
      <th>Approve Request</th>
      <th>Reject Request</th>
    </tr>
    

        @php 
        
            
            $appRequests = json_decode($appRequests, true);

            foreach($appRequests as $request) {
                echo "<tr>";
                    echo "<td>";
                    echo $request['name'];
                    echo "</td>";
                    echo "<td>";
                    echo $request['surname'];
                    echo "</td>";
                    echo "<td>";
                    echo $request['studentID'];
                    echo "</td>";
                    echo "<td>";
                    echo $request['room_id'];
                    echo "</td>";
                    echo "<td>";
                    echo $request['approved'];
                    echo "</td>";
                    echo "<td>";
                    echo "<a href=\"approve" . $request['id'] . "\"><span style=\"color:green\">Approve</span></a>";
                  
                    echo "</td>";
                    echo "<td>";
                    echo "<a href=\"reject" . $request['id'] . "\"><span style=\"color:red\">Reject</span></a>";
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