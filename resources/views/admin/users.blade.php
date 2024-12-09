@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Users</h2>
    @can('create user')
    <a href="{{ route('user.create') }}" class="btn btn-dark">
        Create User
    </a>
    @endcan
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id  }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->roles as $role)
                    <span class="badge text-bg-dark">{{ $role->name }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="" class="btn btn-dark">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
