<?php
    
    namespace App\Http\Controllers;
    
    use App\Book;
    use App\Genre;
    use Illuminate\Http\Request;
    use Validator;
    
    class BookController extends Controller
    {
//        public function __construct()
//        {
//            $this->middleware('auth');
//        }
        
        public function showBooks()
        {
            $books = Book::All();
            return view('books.show', compact('books'));
        }
        
        public function createBooks()
        {
            $genres = Genre::All();
            return view('books.create', compact('genres'));
        }
        
        public function updateBooks($id)
        {
            $book = Book::find($id);
            $genres = Genre::All();
            return view('books.update', compact('genres', 'book'));
        }
        
        public function deleteBooks($id)
        {
            $book = Book::find($id);
            $book->delete();
//
            return redirect('/books/show')->with('warning', 'Book successfully deleted!');
        }
        
        public function storeBooks(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:books|max:255',
                'author' => 'required|max:100',
                'genre_id' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect('/books/create')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $book = new Book([
                    'name' => $request->name,
                    'author' => $request->author,
                    'genre_id' => $request->genre_id
                ]);
                $book->save();
                return redirect('/books/show')->with('success', 'Book created!');
            }
        }
        
        public function updateStoreBooks(Request $request, $id)
        {
            $book = Book::find($id);
            $book->name = $request->bookName;
            $book->author = $request->bookAuthor;
            $book->genre_id = $request->genreId;
            $book->save();
            return redirect('/books/show')->with('success', 'Book informations updated!');
        }
    }
