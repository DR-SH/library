<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

use App\Comment;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * @param \App\Http\Requests\CommentRequest $request
     * @return mixed
     */
    public function create(CommentRequest $request)
    {
        $user_id = Auth::user()->id;
        //return $request->input('book');
        $comment =  Comment::create(['message' => $request->input('message'),
                                'book_id' => $request->input('book'),
                                'user_id' => $user_id]);
        if($comment){
            return json_encode(['message' => $comment->message,
                                'created_at' => $comment->created_at->toDateTimeString(),
                                'user' => Auth::user()->name ]);
        }
        return 0;
    }
}
