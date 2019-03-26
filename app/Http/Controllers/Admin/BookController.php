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
     * Show the form for creating a new book.
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
        $book = Book::create($request->all());
        $book = $this->updateOrCreate($book, $request);
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
        $book = $this->updateOrCreate($book, $request);
        return redirect('admin')->with('flash_msg', 'Отредактирована книга: '.$book->title);
    }


    /**
     * Create a new file
     *
     * @param App\Book - book
     * @param $file - loaded file
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

    /**
     * Make operation for creating or updating the book
     *
     * @param \App\Book $book
     * @param $request
     * @return mixed
     */
    private function updateOrCreate($book, $request){
        $book->genre()->associate($request->input('genre'));
        $book->authors()->sync($request->input('authors'));
        $book->store()->updateOrCreate(['amount' => $request->input('amount')]);
        $this->fileUpload($book, $request->file('loadFile'));
        $this->coverUpload($book, $request->file('loadCover'));
        $book->save();
        return $book;
    }

}
