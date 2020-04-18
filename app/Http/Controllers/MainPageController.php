<?php

namespace App\Http\Controllers;

use App\Priority;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;


class MainPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request)
    {
        $projects = User::current()->favoriteProjects;
        $priorities = Priority::whereIn('slug', ['high', 'immediate'])->get(['id'])->map(function ($priority) {
            return $priority['id'];
        })->toArray();
        $tasks = User::current()->tasks()->whereIn('priority_id', $priorities)->get();
        return view('pages.main', [
            'projects' => $projects,
            'tasks' => $tasks,
        ]);
    }
}
