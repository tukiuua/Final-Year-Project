@extends('layouts.app')

@section('content')
<div class="centreContent">
    <img src="{{URL::asset('/images/homepage_main_banner.jpg')}}" alt="main_banner" height="80%" width="80%">
</div>


<div class="container">                  
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id=mainNavButtons> 
        <button class="button"><a href="viewAccomodation">View Accommodation</a></button>
        <button class="button"><a href="applyAccomodation">Apply For Accommodation</a></button>
        <button class="button"><a href="searchAccomodation">Search For Accommodation</a></button>
    </div>
</div>

<div class="footer">&copy; Copyright Tux Villages.</div>

@endsection
