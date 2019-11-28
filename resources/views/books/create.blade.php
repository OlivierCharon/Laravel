@extends('layouts.welcomeLayout')
@section('welcome-content')

    <h1 class="text-center">Create new book</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-5" action="{{ route('store-books') }}" method="POST">
        @csrf
        <ul class="form-style-1">
            <li>
                <label for="name">Book name <span class="required">*</span></label>
                <input id="name" type="text" name="name" class="field-long" placeholder="Book..."/>
            </li>

            <li>
                <label for="author">Author name <span class="required">*</span></label>
                <input id="author" type="text" name="author" class="field-long" placeholder="Author..."/>
            </li>

            <li>
                <label for="genre_id">Genre</label>
                <select id="genre_id" name="genre_id" class="field-select">
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </li>


            <li>
                <input type="submit" value="Submit"/>
            </li>
        </ul>
    </form>


@endsection