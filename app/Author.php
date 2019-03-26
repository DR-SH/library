<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get books associated with the author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }

    /**
     * Get ids of books associated with the author.
     *
     * @return array
     */
    public function booksIds()
    {
        return $this->books->pluck('id')->toArray();
    }

}
