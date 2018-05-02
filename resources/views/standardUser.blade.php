@extends('layouts.app')

@section('content')

 @if(Auth::check()) 
       
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1> Hello Student</h1>
                        <div id="dashboardButtons">
                            <button class="dashboardButton"><a href="viewAccomodation">View Accommodations<br><br><img src="{{URL::asset('/images/dashboard_icons/accomm_icon.png')}}" alt="viewAccomodation" height="90px" width="90px"></a></button>
                            <button class="dashboardButton"><a href="applyAccomodation">Apply For Accommodation<br><br><img src="{{URL::asset('/images/dashboard_icons/apply_icon.png')}}" alt="applyAccomodation" height="90px" width="90px"></a></button>
                            <button class="dashboardButton"><a href="viewApplicationStatus">View application status<br><br><img src="{{URL::asset('/images/dashboard_icons/status_icon.png')}}" alt="viewApplication" height="90px" width="90px"></a></button>
                            <button class="dashboardButton"><a href="searchAccomodation">Search For Accommodation<br><br><img src="{{URL::asset('/images/dashboard_icons/search_icon.png')}}" alt="searchAccomodation" height="90px" width="90px"></a></button>
                            <button class="dashboardButton"><a href="rateAccomodation">Rate your Accomodation<br><br><img src="{{URL::asset('/images/dashboard_icons/rate_icon.png')}}" alt="rateAccomodation" height="90px" width="90px"></a></button>
                            <button class="dashboardButton"><a href="messageBoard">Participate in a message board<br><br><img src="{{URL::asset('/images/dashboard_icons/msgboard_icon.png')}}" alt="messageBoard" height="90px" width="120px"></a></button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif



@endsection
