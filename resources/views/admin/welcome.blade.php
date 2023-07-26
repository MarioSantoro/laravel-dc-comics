@extends('layout.app')


@section('main-content')
    <div class="container-modal" id="modale">
        <div class="modale">
            <div class="header">
                <p class="fw-semibold fs-4 m-0 text-white">Sei sicuro di voler eliminare questo fumetto? </p>
            </div>
            <div class="button h-100 d-flex justify-content-center align-items-center gap-3">
                <button class="btn btn-danger" id="Si">Si</button>
                <button class="btn btn-primary" id="No">No</button>
            </div>

        </div>
    </div>
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
        let controll;
        const buttonElement = document.getElementById('modale');
        const button1 = document.getElementById('Si');
        const button2 = document.getElementById('No');
        const formElements = document.querySelectorAll('form.form-deleter');
        formElements.forEach(formElement => {
            formElement.addEventListener('submit', function(event) {
                event.preventDefault();
                buttonElement.classList.add('active')
                showConfirmationModal().then((result) => {
                    if (result) {
                        this.submit();
                    }
                });
            });
        });

        function scelta(choice) {
            return choice;
        }

        function showConfirmationModal() {
            return new Promise(function(resolve, reject) {
                // Aggiungi gli event listener ai pulsanti
                button1.addEventListener("click", function() {
                    buttonElement.classList.remove('active')
                    resolve(true); // Risolve la promessa con valore true
                });
                button2.addEventListener("click", function() {
                    console.log("Azione annullata!");
                    buttonElement.classList.remove('active')
                    resolve(false); // Risolve la promessa con valore false
                });
            });
        }
    </script>
@endsection
