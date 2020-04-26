<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;

// @todo Check user rights for project, task, comment
class CommentsController extends Controller
{
    public function index(Project $project, Task $task)
    {
        return $task->comments()->with('author')->get()->map(function($comment){
            return [
                'id' => $comment->id,
                'author' => $comment->author->name,
                'date' => $comment->created_at->format('d.m.Y H:i'),
                'text' => nl2br($comment->text)
            ];
        });
    }

    public function create(Project $project, Task $task, Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|max:65535',
        ]);

        $comment = new Comment();
        $comment->text = $validated['message'];
        $comment->task()->associate($task);
        $comment->author()->associate(User::current());

        $comment->save();

        if ($request->ajax()) {
            return ['success' => true, 'message' => 'Task updated'];
        }

        return redirect($task->path())->with('message', 'Task updated');
    }

    public function destroy(Comment $comment)
    {
        $task = $comment->task();
        $comment->delete();
    }
}
