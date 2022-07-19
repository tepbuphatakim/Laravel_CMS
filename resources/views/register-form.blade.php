<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
</head>
<body>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <p>Name:</p>
        <input type="text" name="name" placeholder="Enter name">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <p>Email:</p>
        <input type="text" name="email" placeholder="Enter email">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <p>Password:</p>
        <input type="password" name="password" placeholder="Enter password">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" style="display: block; margin-top: 5px;">Register</button>
    </form>
</body>
</html>