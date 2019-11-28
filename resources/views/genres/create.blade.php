@extends('layouts.welcomeLayout')
@section('welcome-content')

    <h1 class="text-center">Create new genre</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-5" action="{{ route('store-genres') }}" method="POST">
        @csrf
        <ul class="form-style-1">
            <li>
                <label for="name">Genre name <span class="required">*</span></label>
                <input id="name" type="text" name="name" class="field-long" placeholder="Genre..."/>
            </li>

            <li>
                <label for="desc">Author name <span class="required">*</span></label>
                <textarea id="desc" name="desc" class="field-long" placeholder="A short description of the new genre...">

                </textarea>
            </li>


            <li>
                <input type="submit" value="Submit"/>
            </li>
        </ul>
    </form>


@endsection