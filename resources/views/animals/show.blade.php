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
            <th scope="col">Description</th>
            <th scope="col">Sex</th>
            <th scope="col">Age</th>
            <th scope="col">Weight</th>
            <th scope="col">Size</th>
            <th scope="col">Race</th>
            @auth
                @if(Auth::user()->right->name == 'Admin')
                    <th scope="col">Actions</th>
                @endif
            @endauth
        </tr>
        </thead>
        <tbody>
        @foreach($animals as $animal)
            <tr>
                <td>{{ $animal->id  }}</td>
                <td>{{ $animal->name  }}</td>
                <td>{{ $animal->desc  }}</td>
                <td>{{ $animal->sex  }}</td>
                <td>{{ $animal->age  }}</td>
                <td>{{ $animal->weight  }}</td>
                <td>{{ $animal->size  }}</td>
                <td>{{ $animal->race->name  }}</td>
                @auth
                    @if(Auth::user()->right->name == 'Admin')
                        <td class="actions">
                            <form action="{{ route('update-animals', $animal->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-info" type="submit">Edit</button>
                            </form>

                            <form action="{{ route('delete-animals', $animal->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">X</button>
                            </form>
                        </td>
                    @endif
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection