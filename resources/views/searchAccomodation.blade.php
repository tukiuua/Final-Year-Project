@extends('layouts.app')
@SECTION('content')

 <h1 id="searchHeader"> Search for accomodation </h1>

    <form class="form-wrapper" method="get" action="">
            <input type="text" id="search" placeholder="Search for a student accomodation (The Ramada, Silver En Suite...)" required>
            <input type="submit" value="go" id="submit">
        </form>

@endsection



   