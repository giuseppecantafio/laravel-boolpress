@extends('layouts.admin')
@section('content')
<h1>{{$post->title}}</h1>
{{-- <h2>{{$post->category->name}}</h2> --}}
<small>{{$post->created_at}}</small>
@endsection