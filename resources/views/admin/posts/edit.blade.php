@extends('layouts.admin')

@section('content')
        <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
  <div class="form-group">
    <label for="title">Title</label>
    <input type="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" name="title" value="{{old('title', $post->title)}}">
    @error('title') 
    <div class="alert-danger">
      {{$message}}
    </div> @enderror
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea type="content" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Enter content" name="content">{{old('content', $post->content)}}</textarea>
    @error('content') 
    <div class="alert-danger">
      {{$message}}
    </div> @enderror

  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category">
      @foreach($categories as $category)
      <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? "selected" : ''}}>{{$category->name}}</option>
      @endforeach
    </select>
    @error('category_id') 
    <div class="alert-danger">
      {{$message}}
    </div> @enderror

  </div>
  <div class="form-check">
      <input type="checkbox" name="published" class="form-check-input @error('published') is-invalid @enderror" id="published">
      <label class="form-check-label" {{old('published') ? 'checked' : ''}} for="published">Pubblicato?</label>
      @error('published') 
    <div class="alert-danger">
      {{$message}}
    </div> @enderror

    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection