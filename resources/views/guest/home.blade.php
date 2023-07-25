@extends('layout.app')


@section('main-content')
    <div class="container mt-5">
        <div class="row d-flex flex-wrap">
            @foreach ($comics as $comic)
                <div class="col-cs">
                    <a href="{{ route('showComic', $comic->id) }}"><img class="" src="{{ $comic->thumb }}"
                            alt="{{ $comic->title }}"></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
