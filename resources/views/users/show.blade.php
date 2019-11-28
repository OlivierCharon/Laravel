@extends('layouts.welcomeLayout')
@section('welcome-content')


    @auth
        @if(Auth::user()->right->name == 'Admin')

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
                    <th scope="col">Email</th>
                    <th scope="col">Right</th>
                    @auth
                        @if(Auth::user()->right->name == 'Admin')
                            <th scope="col">Actions</th>
                        @endif
                    @endauth
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id  }}</td>
                        <td>{{ $user->name  }}</td>
                        <td>{{ $user->email  }}</td>
                        <td>{{ $user->right->name  }}</td>
                        <td class="actions">
                            <form action="{{ route('update-users', $user->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-info" type="submit">Edit</button>
                            </form>

                            <form action="{{ route('delete-users', $user->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">X</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    @endauth

@endsection