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
    // @todo постраничка
    public function index(Project $project)
    {
        return view('pages.project-tasks', ['project' => $project]);
    }

    // /projects/{project}/tasks/{task}
    // @todo проверка доступа к текущему юзеру
    public function show(Project $project, Task $task)
    {
        return view('pages.task', ['task' => $task]);
    }

    public function comments(Project $project, Task $task)
    {
        return $task->comments()->with('author')->get()->map(function($comment){
            return [
                'author' => $comment->author->name,
                'date' => $comment->created_at->format('d.m.Y H:i'),
                'text' => nl2br($comment->text)
            ];
        });
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

        return redirect($task->path())->with('message', 'Task updated');
    }
}
