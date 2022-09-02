@extends('main')

@section('content')
  <h1>Articles</h1>

  <a href="{{route('articles.create')}}" class="btn btn-primary">Create article</a>


  @if($articles->count() === 0)
    <p>No articles</p>
  @endif

  @include('messages')
  
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Img</th>
        <th>Name</th>
        <th>Content</th>
        <th>Category</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

      @foreach ($articles as $article)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$article->image}}</td>
        <td>
          <a href="{{route('articles.edit', ['article'=>$article->id])}}">{{$article->name}}</a>
        </td>
        <td>{{$article->content}}</td>
        <td>{{$article->category->name}}</td>

        <td>
          <form action="{{route('articles.destroy', ['article'=>$article->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>

  {{$articles->links()}}
@endsection