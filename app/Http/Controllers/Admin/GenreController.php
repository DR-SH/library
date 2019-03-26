<?php

namespace App\Http\Controllers\Admin;

use App\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the authors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::orderBy('genre')->paginate(15);
        return view('admin/genres/index', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new author.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/genres/create');
    }

    /**
     * Store a newly created genre in storage.
     *
     * @param  \App\Http\Requests\GenreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        $genre = Genre::create($request->all());
        return redirect('admin')->with('flash_msg', 'Создан жанр: '.$genre->genre);
    }

    /**
     * Show the form for editing the specified genre.
     *
     * @param  \App\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function edit($genre)
    {
        return view('admin/genres/edit', ['genre' => $genre]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GenreRequest $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, $genre)
    {
        $genre->update($request->all());
        return redirect('admin')->with('flash_msg', 'Отредактирован жанр: '.$genre->genre);
    }


}
