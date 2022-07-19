@extends('layouts.main')

@section('title', 'Login')

@section('content') 
    <h4>Login</h4>
    <form action="{{ route('user.login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" type="text" name="email" placeholder="Enter email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Enter password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection
