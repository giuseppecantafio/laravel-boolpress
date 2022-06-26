@extends('layouts.admin')
@dump($tags)
@section('content')
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        @method('POST')
  <div class="form-group">
    <label for="title">Title</label>
    <input type="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" name="title" value="{{old('title')}}">
     @error('title') 
    <div class="alert-danger">
      {{$message}}
    </div> @enderror
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea type="content" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Enter content" name="content">{{old('content')}}</textarea>
     @error('content') 
      <div class="alert-danger">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category">
      @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>
     @error('category_id') 
    <div class="alert-danger">
      {{$message}}
    </div> @enderror
  </div>
  <div class="form-check">
      <input type="checkbox" name="published" class="form-check-input  @error('published') is-invalid @enderror" id="published">
      <label class="form-check-label" {{old('published') ? 'checked' : ''}}  for="published">Pubblicato?</label>
      @error('published') 
    <div class="alert-danger">
      {{$message}}
    </div> @enderror
  </div>


<div class="form-group">
  <h5>Tags</h5>
      @foreach($tags as $tag)
    <div class="form-check-inline">
      <input type="checkbox" name="tags[]" class="form-check-input" id="{{$tag->slug}}" value="{{$tag->id}}">
      <label class="form-check-label" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}} for="{{$tag->slug}}">{{$tag->name}}</label>
    </div>
      @endforeach
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection