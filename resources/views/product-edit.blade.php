@extends('layouts.main')

@section('title', 'Article 2')

@section('content')
    <form action="{{ route('product.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Enter name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Enter price">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Image</label>
            <img src="{{ asset($product->image) }}" style="width: 200px; height: auto;">
            <input type="file" name="image" accept="image/*" style="display: block;">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{ route('product.index') }}">
            <button type="button" class="btn btn-secondary">Back</button>
        </a>
    </form>
@endsection
