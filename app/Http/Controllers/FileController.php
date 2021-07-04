<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{

    public function files(File $file){
        $file->incrementViews();
        return view('files', [ 'file' => $file ]);
    }

    public function uploads(Request $request, File $file){
        $requestFile    = $request->file('file');
        $extension      = $requestFile->getClientOriginalExtension();
        $filename       = time().'.'.$extension;
        Storage::disk('s3')->put($filename, fopen($requestFile, 'r+'), 'public'); //upload to s3

        //save
        $file->filename     = $filename;
        $file->views        = 0;
        $file->downloads    = 0;
        $file->save();

        return redirect()
                ->route('files', [$file->id]);
    }

    public function downloads(Request $request, File $file){
        if(!session()->exists("_$file->id")){
            $file->incrementDownloads();
            Session::put("_$file->id", true);
        }

        $headers = ['Content-Disposition' => 'attachment; filename="'.$file->filename.'"'];
        return Response::make(Storage::disk('s3')->get($file->filename), 200, $headers);
    }
}
