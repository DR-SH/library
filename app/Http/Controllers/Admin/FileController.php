<?php

namespace App\Http\Controllers\Admin;

use App\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    /**
     * Delete the file.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $f = Storage::disk();
        if($f->delete($request->filename)){
            return File::destroy($request->id);
        }
        return 0;
    }
}
