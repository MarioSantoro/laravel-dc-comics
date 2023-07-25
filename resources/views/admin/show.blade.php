@extends('layout.app')


@section('main-content')
    <div class="container mt-5">
        <div class="row  d-flex flex-column align-items-center">
            <div class="col-cs">
                <img class="" src="{{ $singleComic->thumb }}" alt="{{ $singleComic->title }}">
            </div>
        </div>
        <div class="text-white">
            <h5 class="">{{ $singleComic->title }}</h5>
            <p class="">{{ $singleComic->description }}</p>
        </div>
    </div>
    </div>
@endsection
