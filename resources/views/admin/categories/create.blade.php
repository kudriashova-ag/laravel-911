@extends('layouts.admin')

@section('content')
  <h1>Create category</h1>

  <form action="{{route('categories.store')}}" method="POST">
    @csrf

    <div class="form-group">
      <label for="name">Category name *:</label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
      @error('name')
        <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    <button class="btn btn-primary mt-3">Save</button>
  </form>

@endsection