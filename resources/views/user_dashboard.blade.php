@extends('layouts.user')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    <p>Welcome to your dashboard, {{ Auth::user()->name }}!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
