<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/projects', function (){
    $projects = \App\Models\Project::all();

    return \App\Http\Resources\ProjectResource::collection($projects);
});

Route::get('/project/{id}', function ($id){
    $project = \App\Models\Project::query()->findOrFail($id);

    return $project;
});

Route::get('/tasks/{id}', function ($id){
    $project = \App\Models\Project::query()->findOrFail($id);
    $tasks = $project->tasks;

    return \App\Http\Resources\ProjectResource::collection($tasks);
});

Route::get('/task/{id}', function ($id){
    $task = \App\Models\Task::query()->findOrFail($id);

    return $task;
});

//Route::post('/task/{id}', function ($id, $data){
//    $task = \App\Models\Task::query()->findOrFail($id);
//    $task->title = $data->title;
//    return $task;
//});

Route::delete('/task/{id}', function ($id){
    $task = \App\Models\Task::query()->findOrFail($id);
    $task->delete();
    return 204;
});

//Route::delete('/projects/{PID}', function ($PID){
//    \Illuminate\Support\Facades\DB::table('projects')->where('PID', $PID)->delete();
//    return 204;
//});
