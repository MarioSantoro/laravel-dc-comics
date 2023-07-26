@extends('layout.app')


@section('main-content')
    <div class="container mt-3">
        @if (session('updated'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success">
                        <p class="m-0">Fumetto aggiornato con successo!!</p>
                    </div>
                </div>
            </div>
        @elseif (session('deleted'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success">
                        <p class="m-0">Fumetto eliminato con successo!!</p>
                    </div>
                </div>
            </div>
        @endif
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
                                <td>
                                    <a href="{{ route('showComic', $comic->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('editComic', $comic->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('deleteComic', $comic->id) }}" method="POST"
                                        class="d-inline-block form-deleter">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const formElements = document.querySelectorAll('form.form-deleter');
        formElements.forEach(formElement => {
            formElement.addEventListener('submit', function(event) {
                event.preventDefault();
                const controll = window.confirm('Vuoi davvero cancellare questo fumetto?');
                if (controll) {
                    this.submit();
                }
            });
        });
    </script>
@endsection
