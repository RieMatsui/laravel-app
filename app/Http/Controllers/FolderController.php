<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)

    {
        // create instance of folder model
        $folder = new Folder();
        // substitute input for title
        $folder->title = $request->title;
        // save linked to user
        Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}
