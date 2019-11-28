@extends('layouts.welcomeLayout')
@section('welcome-content')

    <h1 class="text-center">Create new user</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-5" action="{{ route('store-users') }}" method="POST">
        @csrf
        <ul class="form-style-1">
            <li>
                <label for="name">Name <span class="required">*</span></label>
                <input id="name" type="text" name="name" class="field-long"
                       placeholder="He's name is..."/>
            </li>

            <li>
                <label for="desc">Password <span class="required">*</span></label>
                <textarea id="desc" name="desc" class="field-long" placeholder="A short description of your user..."></textarea>
            </li>

            <li>
                <label for="age">Age <span class="required">*</span></label>
                <input id="age" type="number" name="age" class="field-long" placeholder="Age..."/>
            </li>

            <li>
                <label for="weight">Weight <span class="required">*</span></label>
                <input id="weight" type="number" name="weight" class="field-long" placeholder="In grammes..."/>
            </li>

            <li>
                <label for="size">Size <span class="required">*</span></label>
                <input id="size" type="number" name="size" class="field-long" placeholder="In centimeters..."/>
            </li>




            <li>
                <input type="submit" value="Submit"/>
            </li>
        </ul>
    </form>


@endsection