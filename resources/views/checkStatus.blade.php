@extends('layouts.app')

@section('content')


<h1 class="applyText"> View your application status </h1>
<br><br><br>
<table id="checkStatusTable">
        <tr>
        <th>Application ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Student ID</th>
        <th>Approved</th>

        </tr>
        
            @php 

                $appRequests = json_decode($appRequests, true);
    
                foreach($appRequests as $request) {
                    echo "<tr>";
                        echo "<td>";
                        echo $request['id'];
                        echo "</td>";
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
                            if ( $request['approved'] == 0){
                                echo  "<span style=\"color:red\"> Not Approved </span>";
                            } else{
                                echo "<span style=\"color:green\"> Approved </span>";
                            }
                        echo "</td>";
                    echo "<tr>";
                }
                
              @endphp
    
</table>

@endsection
