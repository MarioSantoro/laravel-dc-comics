@extends('layout.app')


@section('main-content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-end">
                <div class="button-create">
                    <a class="btn btn-primary" href="{{ route('CreateAdmin') }}">Create New Comic</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Series</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comics as $comic)
                            <tr>
                                <th scope="row">{{ $comic->title }}</th>
                                <td>{{ $comic->series }}</td>
                                <td>{{ $comic->type }}</td>
                                <td><a href="{{ route('showComic', $comic->id) }}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
