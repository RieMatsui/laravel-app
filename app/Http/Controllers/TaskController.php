<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Folder;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    /**
     * task list
     *
     * @param Folder $folder
     * @return \Illuminate\View\View
     */
    public function index(int $id)
    {
        // すべてのフォルダを取得する
        $folders = Auth::user()->folders()->get();
        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);
        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $current_folder->tasks()->get();
        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }
    /**
     * show task make form
     *
     * @param Folder $folder
     * @return \Illuminate\View\View
     */
    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id,
        ]);
    }

    /**
     * function creating task.
     *
     * @param Folder $folder
     * @param CreateTask $request
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\View\View
     */
    public function showEditForm(int $id, int $task_id)
    {
        $task = Task::find($task_id);
        $folder = Folder::find($id);

        $this->checkRelation($folder, $task);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    /**
     * edit task
     *
     * @param Folder $folder
     * @param Task $task
     * @param EditTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(int $id, int $task_id, EditTask $request)
    {
        $folder = Folder::find($id);
        $task = Task::find($task_id);

        $this->checkRelation($folder, $task);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'id' => $task->folder_id,
        ]);
    }

    /**
     * check relate folder to task.
     *
     * @param Folder $folder
     * @param Task $task
     * @return Illuminate/Foundation/helpers
     */
    public function checkRelation(Folder $folder, Task $task)
    {

        if ($folder->id !== $task->folder_id) {
            abort(404);
        }
    }
}
