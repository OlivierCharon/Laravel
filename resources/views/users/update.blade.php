@extends('layouts.welcomeLayout')
@section('welcome-content')

    @auth
        @if(Auth::user()->right->name == 'Admin')

            <h1 class="text-center">Update book informations</h1>

            <form class="mt-5" action="{{ route('update-store-books', $book->id) }}" method="POST">
                @csrf
                <ul class="form-style-1">
                    <li>
                        <label for="bookName">Book name <span class="required">*</span></label>
                        <input id="bookName" type="text" name="bookName" class="field-long" value="{{ $book->name }}"
                               placeholder="Projet..."/>
                    </li>

                    <li>
                        <label for="bookAuthor">Author name <span class="required">*</span></label>
                        <input id="bookName" type="text" name="bookAuthor" class="field-long"
                               value="{{ $book->author }}"
                               placeholder="Projet..."/>
                    </li>


                    <li>
                        <label for="genreId">Genre</label>
                        <select id="genreId" name="genreId" class="field-select">
                            @foreach($genres as $genre)
                                @if($genre->name == $book->genre->name)
                                    <option selected value="{{$genre->id}}">{{ $genre->name }}</option>
                                @else
                                    <option value="{{$genre->id}}">{{ $genre->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </li>


                    <li>
                        <input type="submit" value="Submit"/>
                    </li>
                </ul>
            </form>

        @else
            <h1>Vous n'avez pas les autorisations pour accéder à cette page</h1>
        @endif
    @endauth

@endsection