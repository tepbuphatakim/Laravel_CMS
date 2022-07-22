<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
</head>
<body>
    <form action="{{ route('tag.update', ['tag' => $tag->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <p>Title:</p>
        <input type="text" name="title" value="{{ $tag->title }}" placeholder="Enter title">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" style="display: block; margin-top: 20px; padding: 12px; background-color: green;">Edit</button>
    </form>
</body>
</html>