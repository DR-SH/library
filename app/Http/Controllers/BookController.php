<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
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
        return view('public/index', ['books' => $books]);
    }

    /**
     * Show the the specified book in storage.
     * 
     * @param \App\Book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('public/show', ['book' => $book]);
    }
}
