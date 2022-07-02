<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFileUploadRequest;

class FileUploadController extends Controller
{
    public function store(StoreFileUploadRequest $request) {
        if ($request->hasFile('file')) {
            $file_url = $request->file->storeAs("files", $request->file_name, "public");
            
            $data = [
                'success' => true,
                'file_url' => $file_url
            ];
            return response()->json($data);
        }

    }
}
