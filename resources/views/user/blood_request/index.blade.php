@extends('layouts.user')

@section('title', 'List of Blood Requests')

@section('content')
    <div class="container">
        <h1 class="mb-4">Blood Requests</h1>
        <div class="row">
            @foreach ($bloodRequests as $bloodRequest)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header" style="background-color: #FF033E; color: white;">
                            <h5 class="card-title mb-0">{{ $bloodRequest->patient_name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <strong>Age:</strong> {{ $bloodRequest->age }} <br>
                                <strong>Blood Type:</strong> {{ $bloodRequest->blood_type }} <br>
                                <strong>Quantity:</strong> {{ $bloodRequest->quantity }} <br>
                                <strong>Contact Info:</strong> {{ $bloodRequest->contact_info }} <br>
                                <strong>Fulfilled:</strong> {{ $bloodRequest->fulfilled ? 'Yes' : 'No' }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('blood_requests.show', $bloodRequest->id) }}" class="btn btn-info"><i class="fas fa-eye"></i> Show Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
