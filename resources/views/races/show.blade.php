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
            <th scope="col">Class</th>
            <th scope="col">Life duration</th>
            @auth
                @if(Auth::user()->right->name == 'Admin')
                    <th scope="col">Actions</th>
                @endif
            @endauth
        </tr>
        </thead>
        <tbody>
        @foreach($races as $race)
            <tr>
                <td>{{ $race->id  }}</td>
                <td>{{ $race->name  }}</td>
                <td>{{ $race->class  }}</td>
                <td>{{ $race->life_duration  }}</td>
                @auth
                    @if(Auth::user()->right->name == 'Admin')
                        <td class="actions">
                            <form action="{{ route('update-races', $race->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-info" type="submit">Edit</button>
                            </form>

                            <form action="{{ route('delete-races', $race->id) }}" method="POST">
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