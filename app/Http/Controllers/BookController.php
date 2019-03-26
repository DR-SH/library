<?php

namespace App\Http\Controllers;
use App\Book;
use App\Genre;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(6);
        $genres = Genre::all();
        return view('public/index', ['books' => $books, 'genres' => $genres]);
    }

    /**
     * Show the the specified book in storage.
     * 
     * @param \App\Book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        if($book->comments()->exists()){
            $comments = $book->comments->sortByDesc('id');
        }
        else{
            $comments = '';
        }

        return view('public/show', ['book' => $book, 'comments' => $comments]);
    }

    /**
     * Display a listing of the books.
     *
     * @param string $text
     * @return \Illuminate\Http\Response
     */
    public function search($text)
    {
        $genres = Genre::all();
        $books = Book::where('title', 'LIKE', "%$text%")->orderBy('id', 'desc')->paginate(6);
        return view('public/index', ['books' => $books, 'text' => $text,'genres' => $genres]);
    }

    /**
     * Display a listing of the books.
     *
     * @param \App\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function genre($genre)
    {
        $genres = Genre::all();
        $books = Book::where('genre_id', $genre->id)->orderBy('id', 'desc')->paginate(6);
        return view('public/index', ['books' => $books, 'genre' => $genre->genre, 'genres' => $genres]);
    }
}
