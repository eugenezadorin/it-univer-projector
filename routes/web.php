<?php

use App\Project;
use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $projects = Project::all();
    $tasks = \App\Task::where("is_important", true)->all();

    return view('pages.main', [
        'fav_projects' => $projects,
        'tasks' => $tasks,
    ]);
});

Route::get('/project', function () {
    return view('pages.project');
});

Route::get('/task', function () {
    return view('pages.task');
});

Route::get('/create-project/{project_name}', function ($name){

    $project = new Project();
    $project->name = $name;
    $project->slug = Str::slug($name);
    $project->description = "Lorem ipsum dolor sit amet";
    $project->save();

});

Route::get('/get-project/{project_name}', function ($name){
    $project = Project::where("name", $name)->firstOrFail();

    dd($project->name);
});




