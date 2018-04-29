@extends('layouts.app')
@SECTION('content')

 <h1 id="searchHeader"> Search for accomodation </h1>

        <form class="form-wrapper" method="get" action="{{URL::to('searchAccomodation/search')}}">
                {!! csrf_field() !!}
            <input type="text" name="query" id="search" placeholder="Search for a student accomodation (The Ramada, Silver En Suite...)" required>
            <input type="submit" value="go" id="submit">
        </form>

@if(isset($details))
<div class="searchResults">
        <div class="caption">Accomodation Search Results</div>
                @foreach ($details as $accom)
        
                        <div id="table">
                                <div class="header-row row">
                                        <span class="cell primary">Accomodation Name</span>
                                        <span class="cell">Location</span>
                                </div>
                                <div class="row">
                                        <input type="radio" name="expand">
                                        <span class="cell primary" data-label="accommName">{{$accom->accomodation_name}}</span>
                                        <span class="cell" data-label="accommAddress">{{$accom->address}}</span>
                                </div>
                                <br>
                        </div>

                <div id=accomSectionContainer_search>
                        <div id="accomSectionContainer">
                                <div class="container2">
                                <img src="{{URL::asset($accom->img_path)}}" alt="Accomodation{{$accom->id}}" width="500"height="400" >
                                <a href="{{ URL::to('accomodation' . $accom->id) }}">
                                        
                                <div class="overlay2">
                                        <div class="text2">Accomodation {{$accom->id}}</div>
                        
                                </div>
                                </a>
                                </div>
                        </div>
                </div>
   
        </div>          @endforeach
@endif


@endsection



   