@extends('layouts.admin')
@section('content')
<h1>{{$post->title}}</h1>
<small>{{$post->created_at}}</small>
@endsection