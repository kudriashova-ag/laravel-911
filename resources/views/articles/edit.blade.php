@extends('main')

@section('content')
  <h1>Edit article</h1>

  <form action="{{route('articles.update', ['article'=>$article->id])}}" method="POST">
    @method('PUT')
    @csrf

   @include('articles._form')

    <button class="btn btn-primary mt-3">Save</button>
  </form>

@endsection