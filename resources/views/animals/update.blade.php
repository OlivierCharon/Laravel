@extends('layouts.welcomeLayout')
@section('welcome-content')

    <h1 class="text-center">Update {{ $animal->name }} the {{ $animal->race->name }} information</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-5" action="{{ route('update-store-animals', $animal->id) }}" method="POST">
        @csrf
        <ul class="form-style-1">
            <li>
                <label for="name">Name <span class="required">*</span></label>
                <input value="{{ $animal->name }}" id="name" type="text" name="name" class="field-long"
                       placeholder="He's name is..."/>
            </li>

            <li>
                <label for="desc">Description <span class="required">*</span></label>
                <textarea id="desc" name="desc" class="field-long" placeholder="A short description of your animal...">{{ $animal->desc }}</textarea>
            </li>
            <li>
                <label for="sex">Sex <span class="required">*</span></label>
                <select name="sex" id="sex">
                    @if($animal->sex == 'F')
                        <option selected value="F">Female</option>
                        <option value="M">Male</option>
                    @else
                        <option value="F">Female</option>
                        <option selected value="M">Male</option>
                    @endif
                </select>
            </li>


            <li>
                <label for="age">Age <span class="required">*</span></label>
                <input value="{{ $animal->age }}" id="age" type="number" name="age" class="field-long"
                       placeholder="Age..."/>
            </li>

            <li>
                <label for="weight">Weight <span class="required">*</span></label>
                <input value="{{ $animal->weight }}" id="weight" type="number" name="weight" class="field-long"
                       placeholder="In grammes..."/>
            </li>

            <li>
                <label for="size">Size <span class="required">*</span></label>
                <input value="{{ $animal->size }}" id="size" type="number" name="size" class="field-long"
                       placeholder="In centimeters..."/>
            </li>

            <li>
                <label for="race_id">Genre</label>
                <select id="race_id" name="race_id" class="field-select">
                    @foreach($races as $race)
                        @if($race == $animal->race->name)
                            <option selected value="{{$race->id}}">{{ $race->name }}</option>
                        @else
                            <option value="{{$race->id}}">{{ $race->name }}</option>
                        @endif
                    @endforeach
                </select>
            </li>

            {{--            <li>--}}
            {{--                <label for="age">Age <span class="required">*</span></label>--}}
            {{--                <select name="age" id="age">--}}
            {{--                    @for($i; $i <= $race->life_duration; $i++)--}}
            {{--                        <option value="{{ $i }}">{{ $i }} years</option>--}}
            {{--                    @endfor--}}
            {{--                </select>--}}
            {{--            </li>--}}

            <li>
                <input type="submit" value="Submit"/>
            </li>
        </ul>
    </form>


@endsection