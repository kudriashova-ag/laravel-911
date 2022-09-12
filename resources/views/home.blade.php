@extends('layouts.app')

@section('content')
  @foreach ($articles as $article)
      {{$article->name}}<br>
      {{$article->category->name}} <br>

      @foreach ($article->tags as $tag)
          {{$tag->name}},
      @endforeach

      <hr>
  @endforeach
@endsection
