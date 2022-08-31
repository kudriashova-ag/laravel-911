@extends('main')

@section('content')
  <h1>Categories</h1>

  <a href="{{route('categories.create')}}" class="btn btn-primary">Create category</a>


  @if($categories->count() === 0)
    <p>No categories</p>
  @endif

  @include('messages')
  
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($categories as $category)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>
          <a href="{{route('categories.edit', ['category'=>$category->id])}}">{{$category->name}}</a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>

@endsection