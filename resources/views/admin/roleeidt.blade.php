@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('role.update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $role->id }}">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="rolename" class="form-label">Role Name</label>
                    <input type="text" class="form-control" name="name" id="rolename" value="{{ old('name') ? old('name') : $role->name }}">
                </div>
            </div>
            @foreach ($permissions as $permission)
            <div class="form-check form-switch">
                <input class="form-check-input" name="permissions[]" type="checkbox" role="switch" id="permissionid{{ $permission->id }}" value="{{ $permission->id }}" {{ in_array($permission->id, $active_permissions) == true ? 'checked' : '' }}>
                <label class="form-check-label" for="permissionid{{ $permission->id }}">
                    {{ $permission->name }}
                </label>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-dark mt-3">Update</button>
    </form>
</div>
@endsection
