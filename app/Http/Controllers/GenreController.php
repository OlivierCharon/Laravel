<?php
    
    namespace App\Http\Controllers;
    
    use App\Genre;
    use Illuminate\Http\Request;
    use Validator;

class GenreController extends Controller
{
    public function showGenres()
    {
        $genres = Genre::All();
        return view('genres.show', compact('genres'));
    }
    
    public function createGenres()
    {
        return view('genres.create');
    }
    
    public function updateGenres($id)
    {
        $genre = Genre::find($id);
        return view('genres.update', compact('genre'));
    }
    
    public function deleteGenres($id)
    {
        $genre = Genre::find($id);
        $genre->delete();

        return redirect('/genres/show')->with('warning', 'Genre successfully deleted!');
    }
    
    public function storeGenres(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:genres|max:255',
            'desc' => 'required|max:255'
        ]);
        
        if ($validator->fails()) {
            return redirect('/genres/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $genre = new Genre([
                'name' => $request->name,
                'desc' => $request->description
            ]);
            $genre->save();
            return redirect('/genres/show')->with('success', 'Genre created!');
        }
    }
    
    public function updateStoreGenres(Request $request, $id)
    {
        $genre = Genre::find($id);
        $genre->name = $request->name;
        $genre->description = $request->description;
        $genre->save();
        return redirect('/genres/show')->with('success', 'Genre informations updated!');
    }
}
