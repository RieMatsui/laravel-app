<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function index(int $id)
  {
    // get all folder
    $folders = Folder::all();
    //get current folder
    $current_folder = Folder::find($id);
    //get task on current folder
    $tasks = Task::where('folder_id', $current_folder->id)->get();

    return view('tasks/index', [
      'folders' => $folders,
      'current_folder_id' => $current_folder->id,
      'tasks' => $tasks,
    ]);
  }
}
