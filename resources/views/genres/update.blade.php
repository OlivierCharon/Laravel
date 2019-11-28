@extends('layouts.welcomeLayout')
@section('welcome-content')

    <h1 class="text-center">Update book informations</h1>

    <form class="mt-5" action="{{ route('update-store-genres', $genre->id) }}" method="POST">
        @csrf
        <ul class="form-style-1">
            <li>
                <label for="name">Genre name <span class="required">*</span></label>
                <input id="name" type="text" name="name" class="field-long" value="{{ $genre->name }}"
                       placeholder="Genre name..."/>
            </li>
            <li>
                <label for="description">Description <span class="required">*</span></label>
                <textarea id="description" name="description" class="field-long" placeholder="A short description of the new genre...">{{ $genre->description }}</textarea>
            </li>


            <li>
                <input type="submit" value="Submit"/>
            </li>
        </ul>
    </form>


@endsection