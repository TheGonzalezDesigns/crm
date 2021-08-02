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

Route::get('/upcoming', function (){
  $upcoming = \App\Models\Upcoming::all();

  return \App\Http\Resources\UpcomingResource::collection($upcoming);
});

Route::post('/upcoming', function (Request $request){
    return \App\Models\Upcoming::create([
        'title' => $request->title,
        'taskId' => $request->taskId,
        'completed' => $request->completed
    ]);
});

Route::delete('/upcoming/{taskId}', function ($taskId){
   \Illuminate\Support\Facades\DB::table('upcomings')->where('taskId', $taskId)->delete();
   return 204;
});

Route::get('/projects', function (){
    $projects = \App\Models\Project::all();

    return \App\Http\Resources\ProjectResource::collection($projects);
});

//Route::get('/projects', function (){
//    $projects = \App\Models\Projects::all();
//    $tasks = [];
//    foreach ($projects as $project) {
//        //$tasks.array_push($project);
//        array_push($tasks, $project->upcomings());
//    }
//    return $project[1];
//    //return \App\Http\Resources\ProjectsResource::collection($projects);
//});

Route::post('/projects', function (Request $request){
    return \App\Models\Project::create([
        'title' => $request->title,
        'PID' => $request->PID,
        'completed' => $request->completed
    ]);
});

Route::delete('/projects/{PID}', function ($PID){
    \Illuminate\Support\Facades\DB::table('projects')->where('PID', $PID)->delete();
    return 204;
});
