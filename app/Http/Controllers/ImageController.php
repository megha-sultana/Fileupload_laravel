<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Files;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Storage;

class ImageController extends Controller
{
    use UploadAble;

    public function showForm()
    {
      return view('upload_files');
    }

    public function uploadFile(Request $request)
    {
        if($request->hasFile('file') && ($request->file instanceof UploadedFile))
        {
            $file = $this->uploadOne($request->file('file'), 'uploads');
            $file = substr($file, strpos($file, "/"));
            $file = str_replace('/', '', $file);

            $saved_data['type']     = 'Single File Upload';
            $saved_data['filename'] = $file;

            Files::create($saved_data);
        }

        foreach($request->file('files') as $key => $file)
        {
            $filename = time().'-'.$file->getClientOriginalName();

            $file->storeAs('public/uploads', $filename);

            $other_data['type'] = 'Multiple File Upload';
            $other_data['filename'] = $filename;

            Files::create($other_data);
        }

        return redirect()->route('display.files')->with('success', 'Files uploaded successfully!');
   }


    public function index()
    {
        $files = Files::all();

        return view('display_files', ['files' => $files]);
    }
}
