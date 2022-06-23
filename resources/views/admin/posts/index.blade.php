@extends('layouts.admin')

@section('content')
<a href="{{route('admin.posts.create')}}"  class="btn btn-primary">New Post</a>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Creation date</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <td>
        <a href="{{route('admin.posts.show', $post->id)}}">
          {{$post->id}}
        </a>
      </td>
      <td>
        <a href="{{route('admin.posts.show', $post->id)}}">
          {{$post->title}}
        </a>
      </td>
      <td>
        <a href="{{route('admin.posts.show', $post->id)}}">
          {{$post->created_at}}
        </a>
      </td>
      <td>
          <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
      </td>
      <td>
            <form id="form" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Elimina</button>
            </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection