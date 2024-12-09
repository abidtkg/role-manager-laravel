@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <select class="js-example-basic-multiple form-control" name="roles[]" multiple="multiple">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
              </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
@section('page-js')
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection