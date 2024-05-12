@extends('layouts.user')

@section('title', 'Blood Request Details')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color: #FF033E; color: white;">
                <h2 class="mb-0">Blood Request Details</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Patient Name:</strong> {{ $bloodRequest->patient_name }}</p>
                        <p><strong>Age:</strong> {{ $bloodRequest->age }}</p>
                        <p><strong>Blood Type:</strong> {{ $bloodRequest->blood_type }}</p>
                        <p><strong>Quantity:</strong> {{ $bloodRequest->quantity }}</p>
                        <p><strong>Hospital Name:</strong> {{ $bloodRequest->hospital_name }}</p>
                        <p><strong>Hospital Location:</strong> {{ $bloodRequest->hospital_location }}</p>
                        <p><strong>Contact Info:</strong> {{ $bloodRequest->contact_info }}</p>
                        <p><strong>Fulfilled:</strong> {{ $bloodRequest->fulfilled ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="col-md-6">
                        <!-- Map Section -->
                        <div id="map" style="height: 300px;"></div>
                    </div>
                </div>
            </div>

            <div class="card-footer ">
                <a href="{{ route('blood_requests.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                <div class="text-right">
                    @if (!$bloodRequest->fulfilled)
                        <form method="POST" action="{{ route('blood_requests.mark_as_donor', $bloodRequest->id) }}">
                            @csrf
                            <button type="submit" class="btn" style="background-color: #FF033E; color: white;"><i class="fas fa-hand-holding-medical"></i> I want to donate blood</button>
                        </form>
                    @else
                        <p class="text-muted">This blood request is already fulfilled.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var coordinates = [{{ $bloodRequest->map_coordinates }}];
            var map = L.map('map').setView(coordinates, 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker(coordinates).addTo(map);
        });
    </script>
@endsection
