@extends('layouts.welcomeLayout')

@section('welcome-content')
    <!-- Page Content -->


    <form class="mt-5">
        <ul class="form-style-1">
            <li>
                <label>Nom du projet <span class="required">*</span></label>
                <input type="text" name="field1" class="field-long" placeholder="Projet..."/>
            </li>
            <li>
                <label>Technologies</label>
                <select name="field4" class="field-select">
                    <option value="Advertise">Advertise</option>
                    <option value="Partnership">Partnership</option>
                    <option value="General Question">General</option>
                </select>
            </li>
            <li>
                <label>Your Message <span class="required">*</span></label>
                <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
            </li>
            <li>
                <input type="submit" value="Submit"/>
            </li>
        </ul>
    </form>


    <!-- /.container -->
@endsection
