<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Show Blood Request')</title>

    <!-- Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif
    <br>

    <div class="container">
        <div class="card">
            <div class="card-header">
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
                        <p><strong>Map Coordinates:</strong> {{ $bloodRequest->map_coordinates }}</p>
                        <p><strong>Contact Info:</strong> {{ $bloodRequest->contact_info }}</p>
                        <p><strong>Fulfilled:</strong> {{ $bloodRequest->fulfilled ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('admin.blood_requests.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
