<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // /projects/{project}/tasks
    public function index(Project $project)
    {
        dd($project);
    }

    // /projects/{project}/tasks/{task}
    public function show(Project $project, Task $task)
    {
        return view('pages.task', ['task' => $task]);
    }

    public function comment(Project $project, Task $task, Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|max:65535',
        ]);

        $comment = new Comment();
        $comment->text = $validated['message'];
        $comment->task()->associate($task);
        $comment->author()->associate(User::current());

        $comment->save();

        return redirect($task->path());
    }
}
