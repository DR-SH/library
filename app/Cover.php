<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'book_id',
    ];


    /**
     * A cover belongs to book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
