<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
	public function store(Request $request)
	{
		if ($request->hasFile('filepond')) {

            $file     = $request->file('filepond');
            $filename = $file->getClientOriginalName();
            $folder   = auth()->user()->tmp_folder_name;
            $file->storeAs('avatars/tmp/'.$folder, $filename, 'public');

            TemporaryFile::create([
                'user_id'  => auth()->user()->id,
                'type'     => 'avatars',
                'folder'   => $folder,
                'filename' => $filename
            ]);

		}
	}
}
