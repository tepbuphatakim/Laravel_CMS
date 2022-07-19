@extends('layouts.main')

@section('title', 'Article 2')

@section('content')
    <h4>Product Show</h4>
    <label>Name: </label>
    <span>{{ $product->name }}</span>
    <br>
    <br>
    <label>Price: </label>
    <span>{{ $product->price }}</span>
    <a href="{{ route('product.index') }}">
        <button type="button" class="btn btn-secondary d-block">Back</button>
    </a>
@endsection
