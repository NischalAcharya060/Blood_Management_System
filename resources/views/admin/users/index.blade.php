@extends('layouts.app')
@section('title', 'User Management')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>User Management</h2>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mb-3 text-right">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create User</a>
                        </div>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Registration At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role === 'user')
                                            <span class="badge badge-secondary">{{ ucfirst($user->role) }}</span>
                                        @elseif($user->role === 'donor')
                                            <span class="badge badge-info">{{ ucfirst($user->role) }}</span>
                                        @elseif($user->role === 'admin')
                                            <span class="badge badge-danger">{{ ucfirst($user->role) }}</span>
                                        @endif
                                    </td>
                                    <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ \Carbon\Carbon::parse($user->created_at)->format('F j, Y / h:i A') }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination links -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
