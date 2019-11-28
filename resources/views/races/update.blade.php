@extends('layouts.welcomeLayout')
@section('welcome-content')

    <h1 class="text-center">Edit this race</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-5" action="{{ route('update-store-races', $race->id) }}" method="post">
        @csrf
        <ul class="form-style-1">
            <li>
                <label for="name">Name <span class="required">*</span></label>
                <input value="{{ $race->name }}" id="name" type="text" name="name" class="field-long"
                       placeholder="The name of this race is..."/>
            </li>

            <li>
                <label for="class">Class <span class="required">*</span></label>
                <input value="{{ $race->class }}" id="class" type="text" name="class" class="field-long" placeholder="The family of this race is...">
            </li>

            <li>
                <label for="life_duration">Age <span class="required">*</span></label>
                <input value="{{ $race->life_duration }}" id="life_duration" type="number" name="life_duration" class="field-long" placeholder="Life duration..."/>
            </li>

            <li>
                <input type="submit" value="Submit"/>
            </li>
        </ul>
    </form>


@endsection