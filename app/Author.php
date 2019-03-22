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
     * Get books associated with this author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }

    /**
     * Get ids of books attached with author.
     *
     * @return array
     */
    public function booksIds()
    {
        return $this->books->pluck('id')->toArray();
    }

}
