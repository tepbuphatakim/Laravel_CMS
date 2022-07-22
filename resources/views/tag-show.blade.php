@extends('layouts.main')

@section('title', 'Tag 2')

@section('content')
    <h2>Tag show</h2>
    <label>Title: </label>
    <span>{{ $tag->title }}</span>
    <br>
    <br>
@endsection
