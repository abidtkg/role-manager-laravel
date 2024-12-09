@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Permissions</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <th scope="row">1</th>
                <td>{{ $role->name }}</td>
                <td>
                    @foreach ($role->permissions as $permission)
                    <span class="badge text-bg-dark">{{ $permission->name }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-dark">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
