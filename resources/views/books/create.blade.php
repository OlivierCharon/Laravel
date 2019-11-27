@extends('layouts.welcomeLayout')
@section('welcome-content')

    <h1 class="text-center">Create new book</h1>

    <form class="mt-5" action="{{ route('store-books') }}" method="POST">
        @csrf
        <ul class="form-style-1">
            <li>
                <label>Book name <span class="required">*</span></label>
                <input type="text" name="bookName" class="field-long" placeholder="Projet..."/>
            </li>

            <li>
                <label>Author name <span class="required">*</span></label>
                <input type="text" name="bookAuthor" class="field-long" placeholder="Projet..."/>
            </li>

            <li>
                <label>Genre</label>
                <select name="genreId" class="field-select">
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