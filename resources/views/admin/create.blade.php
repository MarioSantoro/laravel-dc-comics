@extends('layout.app')


@section('main-content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-white">Create a New Comic</h1>
                <form action="{{ route('AdminStore') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control" id="floatingInput"
                            placeholder="Example : Batman-Beyond">
                        <label for="floatingInput">Insert title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="thumb" id="floatingInput"
                            placeholder="Example : Batman-Beyond">
                        <label for="floatingInput">URL Image</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="price" id="floatingInput"
                            placeholder="Example : Batman-Beyond">
                        <label for="floatingInput">Price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="series" id="floatingInput"
                            placeholder="Example : Batman-Beyond">
                        <label for="floatingInput">Series</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="sale_date" id="floatingInput"
                            placeholder="Example : Batman-Beyond">
                        <label for="floatingInput">Sale Date</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="type" id="floatingInput"
                            placeholder="Example : Batman-Beyond">
                        <label for="floatingInput">Type of Book</label>
                    </div>
                    <div class="button">
                        <input type="submit" class="btn btn-primary">Create</input>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
