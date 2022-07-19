@extends('layouts.main')

@section('title', 'Article 2')

@section('content')
    <h2>Article show</h2>
    <label>Title: </label>
    <span>{{ $article->title }}</span>
    <br>
    <br>
    <label>Content: </label>
    <span>{{ $article->content }}</span>
@endsection
