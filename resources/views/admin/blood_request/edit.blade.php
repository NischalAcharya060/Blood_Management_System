<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Edit Blood Request Status')</title>

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
            <div class="card-header" style="background-color: #FF033E; color: white;">
                <h2 class="mb-0">Edit Blood Request Status</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.blood_requests.update', $bloodRequest->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="fulfilled" class="font-weight-bold">Fulfilled:</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="fulfilled" name="fulfilled" value="1" {{ $bloodRequest->fulfilled ? 'checked' : '' }}>
                            <label class="custom-control-label" for="fulfilled"></label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check-circle"></i> Update Status
                        </button>
                        <a href="{{ route('admin.blood_requests.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
