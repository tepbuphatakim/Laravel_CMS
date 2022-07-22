<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.main')

@section('title', 'Tag 2')

@section('content')
    <a href="{{ route('tag.create') }}">
        <button type="button" class="btn btn-primary mb-2">Create</button>
    </a>
    <table class="table table-striped table-dark">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        @foreach ($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->title }}</td>
                <td>
                    <a href="{{ route('tag.show', ['tag' => $tag->id]) }}">
                        <button type="button" class="btn btn-secondary">Show</button>
                    </a>
                    <a href="{{ route('tag.edit', ['tag' => $tag->id]) }}">
                        <button type="button" class="btn btn-info">Edit</button>
                    </a>
                    <button 
                        onclick="setDeleteModalAction()" 
                        data-attr="{{ route('tag.destroy', ['tag' => $tag->id]) }}" 
                        class="btn btn-danger" 
                        data-toggle="modal" 
                        data-target="#deleteModal"
                    >
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
    <nav class="d-flex justify-content-end">
        <ul class="pagination">
            @for ($page = 1; $page <= $tags->lastPage(); $page++)
                <li class="page-item">
                    <a class="page-link" href="{{ route('tag.index', ['page' => $page]) }}">
                        {{ $page }}
                    </a>
                </li>
            @endfor
        </ul>
    </nav>
    {{-- modal --}}
    <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="modalDeleteForm" method="POST" style="display: inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function setDeleteModalAction() {
            document.getElementById('modalDeleteForm').setAttribute('action', event.target.getAttribute('data-attr'));
        }
    </script>
@endsection

</body>
</html>