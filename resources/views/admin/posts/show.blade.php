@extends('layouts.admin')
@section('content')

<h1>Titolo post: {{$post->title}}</h1>
<h2> Categoria post: {{$post->category == null ? 'Senza categoria' : $post->category->name}}</h2>
<h2> Contenuto post: {{$post->content}}</h2>
<h3>Tags: @foreach ($post->tags as $elm) {{$elm->name}}, @endforeach</h3>
<small>Post creato: {{$post->created_at}}</small>
@endsection