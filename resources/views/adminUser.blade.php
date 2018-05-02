@extends('layouts.app')

@section('content')
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

                    <h1> Admin User </h1>

                        <div id="adminButtons">
                            <button class="button"><a href="listRoom">List a room</a></button>
                            <button class="button"><a href="removeRoom">Remove a room</a></button>
                            <button class="button"><a href="viewAppRequests">View application requests</a></button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
