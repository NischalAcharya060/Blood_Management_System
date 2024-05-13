@extends('layouts.user')

@section('title', 'List of Blood Requests')

@section('content')
    <div class="container">
        <h1 class="mb-4">Blood Requests</h1>
        <!-- Search and Filter Form -->
        <form action="{{ route('blood_requests.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" name="search" placeholder="Search by patient name, hospital name and location" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" onclick="clearSearch()"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="blood_type" class="form-control">
                        <option value="">Select Blood Type</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn" style="background-color: #FF033E; color: white;"><i class="fas fa-search"></i> </button>
                </div>
            </div>
        </form>

        <!-- Blood Requests List -->
        @if ($bloodRequests->isEmpty())
            <div class="alert alert-info">No blood requests found.</div>
            <a href="{{ route('blood_requests.index') }}" class="btn btn-secondary mb-4">Back</a>
        @else
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
                                    <strong>Hospital Name:</strong> {{ $bloodRequest->hospital_name }} <br>
                                    <strong>Hospital Location:</strong> {{ $bloodRequest->hospital_location }} <br>
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
        @endif
    </div>
    <script>
        function clearSearch() {
            document.querySelector('[name="search"]').value = '';
        }
    </script>
@endsection
