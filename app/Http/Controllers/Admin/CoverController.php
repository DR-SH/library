<?php

namespace App\Http\Controllers\Admin;

use App\Cover;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoverController extends Controller
{
    /**
     * Delete the cover.
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $f = Storage::disk();
        if($f->delete($request->filename)){
            return Cover::destroy($request->id);
        }
        return 0;
    }
}
