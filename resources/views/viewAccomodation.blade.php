@extends('layouts.app')
<meta name="viewport" content="width=device-width, initial-scale=1">

@SECTION('content');
<div id="container" class="centreContent">
  <img src="{{URL::asset('/images/AccomBanner.jpg')}}" alt="main_banner">
</div>

<div id="accomMainText">
  <p> 
  Birmingham is Located in the west midlands with a population of around 1,073,000. There is one thing Birmingham definitely isn’t short of, and that is higher education establishments.
  Three Major Universities: Birmingham City University, the University of Birmingham and Aston University, and that’s not forgetting it’s two university colleges: Newman University college and University College Birmingham.
  </p>
</div>

<div class="centreContent">
  <div id="accomSectionContainer">
    <div class="container2">
      <img src="{{URL::asset($accomodations[0]->img_path)}}" alt="Accommodation1" width="500"height="400" >
      <a href="accomodation1">
        <div class="overlay2">
          <div class="text2">Accommodation 1</div>

        </div>
      </a>
  </div>
</div>

  <div id="accomSectionContainer">
    <div class="container2">
        <img src="{{URL::asset($accomodations[1]->img_path)}}" alt="Accommodation2" width="500"height="400" >
        <a href="accomodation2">
          <div class="overlay2">
            <div class="text2">Accommodation 2</div>
          </div>
        </a>
    </div>
  </div>

  <div id="accomSectionContainer">
    <div class="container2">
      <img src="{{URL::asset('insert path here')}}" alt="Accommodation3" width="500"height="400" >
        <a href="accomodation3">
          <div class="overlay2">
            <div class="text2">Accommodation 3</div>
          </div>
        </a>
  </div>
  </div>
  <div id="accomSectionContainer">
    <div class="container2">
    <img src="{{URL::asset('insert path here')}}" alt="Accommodation4" width="500"height="400" >
    <a href="accomodation4">
      <div class="overlay2">
        <div class="text2">Accommodation 4</div>
      </div>
    </a>
  </div>
  </div>
</div>

@endsection