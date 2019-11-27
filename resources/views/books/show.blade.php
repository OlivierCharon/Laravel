@extends('layouts.welcomeLayout')
@section('welcome-content')



    @if(session()->has('success'))
        <script type="application/javascript">
            $(document).ready(function () {
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                    $("#success-alert").slideUp(500);
                });
            });
        </script>

        <div class="alert alert-success" id="success-alert">
            {{ session()->get('success') }}
        </div>
        @elseif(session()->has('warning'))
        <div class="alert alert-warning" id="warning-alert">
            {{ session()->get('warning') }}
        </div>
    @endif

    <table class="m-auto mt-5 table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Author</th>
            <th scope="col">Genre</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id  }}</td>
                <td>{{ $book->name  }}</td>
                <td>{{ $book->author  }}</td>
                <td>{{ $book->genre->name  }}</td>
                <td class="actions">
                    <form action="{{ route('update-books', $book->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-info" type="submit">Edit</button>
                    </form>

                    <form action="{{ route('delete-books', $book->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">X</button>
                    </form>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection