<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function uploads(Request $request){
        $requestFile    = $request->file('file');
        $extension      = $requestFile->getClientOriginalExtension();
        $filename       = time().'.'.$extension;
        Storage::disk('s3')->put($filename, fopen($requestFile, 'r+'), 'public');
    }
}
