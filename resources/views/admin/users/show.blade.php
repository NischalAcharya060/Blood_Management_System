<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'User Details')</title>

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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Details</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <input id="role" type="text" class="form-control" value="{{ ucfirst($user->role) }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="created_at">Registration Date</label>
                            <input id="created_at" type="text" class="form-control" value="{{ $user->created_at->format('F j, Y') }}" readonly>
                        </div>

                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

