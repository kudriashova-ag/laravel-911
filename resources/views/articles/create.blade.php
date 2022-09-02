@extends('main')

@section('content')
  <h1>Create article</h1>

  <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

   @include('articles._form')

    <button class="btn btn-primary mt-3">Save</button>
  </form>

@endsection