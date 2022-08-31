@extends('main')

@section('content')

  <h1>{{$title}}</h1>
  {!! $subtitle !!}

  @foreach ($arr as $item)
      {{$loop->iteration}}.  {{$item}} <br>
  @endforeach  

@endsection


@section('title', $title)

@section('js')
    <script>
      console.log('{{$title}}');
    </script>
@endsection