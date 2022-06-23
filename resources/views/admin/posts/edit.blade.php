@extends('layouts.admin')

@section('content')
        <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
  <div class="form-group">
    <label for="title">Title</label>
    <input type="title" class="form-control" id="title" placeholder="Enter title" name="title" value="{{old('title', $post->title)}}">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea type="content" class="form-control" id="content" placeholder="Enter content" name="content">{{old('content', $post->content)}}</textarea>
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <select name="category_id" class="form-control" id="category">
      @foreach($categories as $category)
      <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? "selected" : ''}}>{{$category->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-check">
      <input type="checkbox" name="published" class="form-check-input" id="published">
      <label class="form-check-label" {{old('published') ? 'checked' : ''}}  for="published">Pubblicato?</label>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection