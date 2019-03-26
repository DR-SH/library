<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Genre;
use App\Author;
use App\File;
use App\Cover;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(6);
        return view('admin/index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin/books/create', ['authors' => $authors, 'genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        //dd($request->all());
        $book = Book::create($request->all());
        $book->genre()->associate($request->input('genre'));
        $book->authors()->sync($request->input('authors'));
        $this->fileUpload($book, $request->file('loadFile'));
        $this->coverUpload($book, $request->file('loadCover'));
        $book->save();
        return redirect('admin')->with('flash_msg', 'Создана книга: '.$book->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin/books/edit', ['book' => $book, 'authors' => $authors, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BookRequest  $request
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $book)
    {
        $book->update($request->all());
        $book->genre()->associate($request->input('genre'));
        $book->authors()->sync($request->input('authors'));
        $this->fileUpload($book, $request->file('loadFile'));
        $this->coverUpload($book, $request->file('loadCover'));
        $book->save();
        return redirect('admin')->with('flash_msg', 'Отредактирована книга: '.$book->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('admin destroy');
    }

    /**
     * This method created new
     *
     * @param App\Book - book
     * @param $file - loaded file
     * @param string $dir
     *
     * @return string - message if file downloaded successfully or empty string instead
     */
    private function fileUpload($book, $file)
    {
        if($file){
            $path = $file->store('public/download/files');
            $newFile = new File(['filename' => $path]);
            $newFile->book()->associate($book);
            $newFile->save();
            return ' Файл загружен.';
        }
        return '';
    }

    /**
     * Create a new cover
     *
     * @param App\Book - book
     * @param $file - loaded file
     *
     * @return string - message if file downloaded successfully or empty string instead
     */
    private function coverUpload($book, $file)
    {
        if($file){
            $path = $file->store('public/download/covers');
            $newFile = new Cover(['filename' => $path]);
            $newFile->book()->associate($book);
            $newFile->save();
            return ' Обложка загружена.';
        }
        return '';
    }

}
