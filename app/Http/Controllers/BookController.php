<?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Book;
    use App\Genre;
    
    
    class BookController extends Controller
    {
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
//            $validatedData = $validatedData = $request->validate([
//                'name' => 'required|unique:books|max:255',
//                'author' => 'required',
//                'genre_id' => 'required'
//                ]);
            
            $book = new Book([
                'name' => $request->bookName,
                'author' => $request->bookAuthor,
                'genre_id' => $request->genreId
            ]);
            
            $book->save();
            return redirect('/books/show')->with('success', 'Book created!');
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
