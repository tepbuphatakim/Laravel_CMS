<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <h3 class="pl-5 pt-2 pb-2">Teaching</h3>
    <div class="row pl-5 pr-5">
        <div class="col-2">
            <ul class="list-group">
                <li class="list-group-item" aria-current="true">
                    <a href="{{ route('product.index') }}" class="active">Product</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('article.index') }}">Article</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('tag.index') }}">Tags</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('user.logout') }}">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-10">
            @yield('content')
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
@yield('script')