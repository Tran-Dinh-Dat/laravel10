<?php

namespace App\Http\Controllers;

use App\Traits\Upload;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    use Upload;

    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $files = File::all();
        return view('index', compact('files'));
    }

    public function store(Request $request)
    {
        $data = [];
        if ($request->hasFile('path')) {
            $path = $this->uploadFile($request->file('path'), 'Medias');
            $data['path'] = $path;
        }
        if ($request->hasFile('path1')) {
            $path = $this->uploadFile($request->file('path1'), 'Medias');
            $data['path1'] = $path;
        }
        if ($request->hasFile('path2')) {
            $path = $this->uploadFile($request->file('path2'), 'Medias');
            $data['path2'] = $path;
        }

        File::create($data);
        return redirect()->route('index')->with('success', 'File Uploaded Successfully');
    }

    public function edit(Request $request, File $file)
    {
        return view('edit', compact('file'));
    }

    public function update(Request $request, File $file)
    {
        foreach ($request->file() as $key => $value) {
            //check if the request has a file
            if ($request->hasFile($key)) {
                //check if the existing file is present and delete it from the storage
                if (! is_null($file->$key)) {
                    $this->deleteFile($file->$key);
                }
                //upload the new file
                $path = $this->UploadFile($request->file($key), 'Medias');
            }
            //upadate the file path in the database
            $file->update([$key => $path]);
            \Log::info($file->toArray());
        }

        //redirect with the success message
        return redirect()->back()->with('success', 'File Updated Successfully');
    }
}
