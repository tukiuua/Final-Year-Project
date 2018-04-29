
@extends('layouts.app')

@SECTION('content')

  <h3 id="addressHeader">{{ $accomodation['accomodation_name'] }}</h3>

  <!-- Slideshow container -->
    <div class="slideshow-container">

        
      @php 
        $counter = 0;
        foreach($accomodation->images as $image){
          $counter++;
            echo " 
            <div class=\"mySlides fade2\">
              <div class=\"numbertext\">" . $counter . "/" . count($accomodation->images) . "</div>
              <img src=\"" .  $image->img_path . "  \" style=\"width:100%\">
              <div class=\"text\">" . $image->image_name . "</div>
            </div> ";
        }
        
      @endphp

      <!-- Next and previous buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
      
    </div>
    <br>

  
    <!-- The dots/circles -->
    <div style="text-align:center">
     
    @php 
      $counter = 0;
      foreach($accomodation->images as $image){
        $counter++;
        echo "<span class=\"dot\" onclick=\"currentSlide(" . $counter . ")\"></span>";
      }
    @endphp


    </div>
    <br>
    <br>
  <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }

  </script>



  <div class="tab">
    <button class="tablinks" onclick="openContent(event, 'About')"><h5>About</h5></button>
    <button class="tablinks" onclick="openContent(event, 'Location')"><h5>Location</h5></button>
    <button class="tablinks" onclick="openContent(event, 'Rooms')"><h5>Rooms</h5></button>
    <button class="tablinks" onclick="openContent(event, 'Contact')"><h5>Contact</h5></button>
  </div>



    <div id="About" class="tabcontent">
      <h3>Overview</h3>
      <br>

      @php
        // process text for accomodation description and add a new line after each forward slash
        // the forward slash was intentionally included in the text to denote a new line  
        $descriptionLine = explode("/",$accomodation['description']);
        foreach($descriptionLine as $line){

            echo $line . "<br><br>";
        }
      @endphp
     

      <h3>Facilities</h3>
      <br>

      <table id="myTable"> 
        
            
      </table>

      <script>
          var items =  @json($accomodation->facilities);
        

          var table = document.getElementById("myTable");
          var row;

          for(var i = 0; i < items.length; i++){
            if(i % 4 == 0) {   //after every 4th cell add a new row and change the row variable to point to it
              row = table.insertRow(-1);      
            }
            var cell = row.insertCell(-1);  //simply insert the row
            cell.innerHTML = items[i].name;
            cell = row.insertCell(-1);
            cell.innerHTML = '<img src=\"' + items[i].img_path  + '\"\width=\"30\" height=\"30\"\>';

          }
      </script>

    </div>



    <div id="Location" class="tabcontent">
      <h3>Location</h3>
      <br>
      <div class="google-maps">
        <iframe width="600" height="450" frameborder="0"
          src=" {{ $accomodation['location_src'] }}" allowfullscreen>
        </iframe>
      </div>

      <a href="https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=b258lh&destinations=aston%20university&key=AIzaSyBeFpgY20dPEl7IzOmPPQ4Tl8U5jExp45M">distance matrix</a>
      <h3>Address: {{ $accomodation['address'] }} </h3>
    </div>

    <div id="Rooms" class="tabcontent">
      <h3>Rooms</h3>
      <br>
      @foreach ($accomodation->rooms as $room) 
          <div class="roomInformation">
            <h4> {{ $room->room_name }} </h4>
            <ul>
              <li> <strong> Availability: </strong> 
                {{-- check numerical value of available rooms and print suitable category label --}}
                @if ($room->total_rooms >= 100)
                  <span style="color:green"> High </span>
                @elseif ($room->total_rooms >= 50)
                  <span style="color:orange"> Limited </span>
                @else
                <span style="color:red">Very Limited </span>
                @endif
              </li>
              <li> <strong>Total price: </strong> 
                @php 
                  //get and store total room price   
                  $roomPriceTotal = $room->price * $room->tenancy_length;   
                  //print and format total room price
                  echo '£' . number_format($roomPriceTotal, 2);
                @endphp
              </li> 
              <li> <strong> Weeks: </strong> {{ $room->tenancy_length }} </li>
              <li> <strong> Start Date: </strong>   {{ \Carbon\Carbon::parse($room->start_date)->format('d/m/Y')}} </li>
            </ul>
            <p> <strong> Price Per Week: </strong> £{{ $room->price }} </p>
            <p> {{ $room->description }} </p>
          </div>
          <hr>
      @endforeach
    </div>

    <div id="Contact" class="tabcontent">
      <h3>Contact</h3>
      <br>

    </div>

  <script>
    function openContent(evt, contentName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(contentName).style.display = "block";
        evt.currentTarget.className += " active";
    }
  </script>

@endsection