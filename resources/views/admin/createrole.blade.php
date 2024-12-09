@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('role.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="rolename" class="form-label">Role Name</label>
                    <input type="text" class="form-control" name="name" id="rolename">
                </div>
            </div>
            @foreach ($permissions as $permission)
            <div class="form-check form-switch">
                <input class="form-check-input" name="permissions[]" type="checkbox" role="switch" id="permissionid{{ $permission->id }}" value="{{ $permission->id }}">
                <label class="form-check-label" for="permissionid{{ $permission->id }}">
                    {{ $permission->name }}
                </label>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-dark mt-3">Create</button>
    </form>
</div>
@endsection
