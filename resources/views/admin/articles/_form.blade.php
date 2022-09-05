<div class="form-group">
  <label for="name">Article name *:</label>
  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="@isset($article) {{$article->name}} @endisset">
  @error('name')
    <div class="invalid-feedback">{{$message}}</div>
  @enderror
</div>


<div class="form-group mt-3">
  <label for="content">Article content *:</label>
  <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror"> @isset($article) {{$article->content}} @endisset </textarea>
  @error('content')
    <div class="invalid-feedback">{{$message}}</div>
  @enderror
</div>

<div class="form-group mt-3">
  <label for="category">Article category *:</label>
  <select name="category_id" id="category" class="form-control  @error('category_id') is-invalid @enderror">
    @foreach ($categories as $category)
        <option value="{{$category->id}}"  @isset($article) @if($article->category_id==$category->id) selected @endif  @endisset >{{$category->name}}</option>
    @endforeach
  </select>
  @error('category_id')
    <div class="invalid-feedback">{{$message}}</div>
  @enderror
</div>


<div class="form-group mt-3">
  <label for="image">Image:</label>
  <input type="file" name="image" id="image" class="form-control">
</div>