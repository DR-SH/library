<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the authors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy('name')->paginate(15);
        return view('admin/authors/index', ['authors' => $authors]);
    }
    
    /**
     * Show the form for creating a new author.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/authors/create');
    }

    /**
     * Store a newly created author in storage.
     *
     * @param  \App\Http\Requests\AuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        $author = Author::create($request->all());
        return redirect('admin')->with('flash_msg', 'Создан автор: '.$author->name);
    }

    /**
     * Show the form for editing the specified author.
     *
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function edit($author)
    {
        return view('admin/authors/edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AuthorRequest $request
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $author)
    {
        $author->update($request->all());
        return redirect('admin')->with('flash_msg', 'Отредактирован автор: '.$author->name);
    }
}
