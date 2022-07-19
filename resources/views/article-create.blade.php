<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>
<body>
    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Title:</p>
        <input type="text" name="title" placeholder="Enter title">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <p>Content:</p>
        <input type="text" name="content" placeholder="Enter content">
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" style="display: block; margin-top: 5px;">Create</button>
    </form>
    {{-- {{ json_encode($errors->all()) }} --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>