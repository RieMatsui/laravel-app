<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Folder;
use App\Task;

class TaskController extends Controller
{
    public function index(int $id)
    {
        // get all folder
        $folders = Folder::all();
        //get current folder
        $current_folder = Folder::find($id);
        //get task on current folder
        $tasks = $current_folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }
    /**
     *  show input form by folder id
     *
     * @param integer $id
     * @return void
     */
    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }
    /**
     * function creating task.
     *
     * @param integer $id
     * @param CreateTask $request
     * @return void current_folder_id
     */
    public function create(int $id, CreateTask $request)
    {

        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $current_folder->id,
        ]);
    }
    /**
     * show edit page by id and task_id
     *
     * @param integer $id
     * @param integer $task_id
     * @return void
     */
    public function showEditForm(int $id, int $task_id)
    {
        $task = Task::find($task_id);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    public function edit(int $id, int $task_id, EditTask $request)
    {

        $task = Task::find($task_id);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'id' => $task->folder_id,
        ]);
    }
}
