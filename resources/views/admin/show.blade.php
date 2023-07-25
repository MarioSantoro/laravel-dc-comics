@extends('layout.app')


@section('main-content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="card">
                    <img class="card-img-top" src="{{ $singleComic->thumb }}" alt="{{ $singleComic->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $singleComic->title }}</h5>
                        <p class="card-text">{{ $singleComic->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
