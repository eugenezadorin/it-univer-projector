<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = User::current()->projects;
        return view('pages.project-list', ['projects' => $projects]);
    }

    public function show($slug)
    {
        $project = User::current()->projects()->where('slug', $slug)->firstOrFail();
        return view('pages.project', ['project' => $project]);
    }

    public function store()
    {
        $project = new \App\Project();
        $project->name = "Test proj";
        $project->slug = \Illuminate\Support\Str::slug($project->name);
        $project->save();

        $task = new \App\Task();
        $task->name = "Create something";
        $task->description = "It is going to be cool";
        $task->assignee()->associate(\App\User::current());
        $task->priority()->associate(\App\Priority::find(1));


        $project->tasks()->save($task);
    }
}
