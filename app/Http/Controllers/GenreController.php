<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function showGenres()
    {
        return view('genres.show');
    }
    
    public function createGenres()
    {
        return view('genres.create');
    }
    
    public function updateGenres()
    {
        return view('genres.update');
    }
    
    public function deleteGenres()
    {
        return view('genres.delete');
    }
}
