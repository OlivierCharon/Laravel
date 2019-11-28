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
            <th scope="col">Desc</th>
            @auth
                <th scope="col">Actions</th>
            @endauth
        </tr>
        </thead>
        <tbody>
        @foreach($genres as $genre)
            <tr>
                <td>{{ $genre->id  }}</td>
                <td>{{ $genre->name  }}</td>
                <td>{{ $genre->description  }}</td>
                @auth
                    <td class="actions">
                        <form action="{{ route('update-genres', $genre->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-info" type="submit">Edit</button>
                        </form>

                        <form action="{{ route('delete-genres', $genre->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">X</button>
                        </form>
                    </td>
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection