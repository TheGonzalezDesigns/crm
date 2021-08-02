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

//Route::get('/upcoming', function (){
//  $upcoming = \App\Models\Upcoming::all();
//
//  return \App\Http\Resources\UpcomingResource::collection($upcoming);
//});
//
//Route::post('/upcoming', function (Request $request){
//    return \App\Models\Upcoming::create([
//        'title' => $request->title,
//        'taskId' => $request->taskId,
//        'completed' => $request->completed
//    ]);
//});

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

//Route::delete('/projects/{PID}', function ($PID){
//    \Illuminate\Support\Facades\DB::table('projects')->where('PID', $PID)->delete();
//    return 204;
//});
