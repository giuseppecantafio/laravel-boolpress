@extends('layouts.admin')
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
            @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}} id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}">
                    <label class="form-check-label"  for="{{$tag->slug}}">{{$tag->name}}</label>
                </div>
            @endforeach
            @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection