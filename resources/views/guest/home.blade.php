@extends('layout.app')


@section('main-content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                @foreach ($comics as $comic)
                    <div class="card">
                        <img class="card-img-top" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <p class="card-text">{{ $comic->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
