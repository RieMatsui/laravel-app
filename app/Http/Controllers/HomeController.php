<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // get login user
        $user = Auth::user();

        $folder = $user->folders()->first();

        // respond to homepage if there is no folder yet
        if (is_null($folder)) {
            return view('home');
        }

        // If there is a folder, redirect to the task list of that folder
        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}
