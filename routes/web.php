<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    // return view('welcome');

    $tasks = App\Task::all();
    return View::make('welcome')->with('tasks',$tasks);
});

Route::get('/tasks/{task_id?}',function($task_id){
    $task = App\Task::find($task_id);

    return response()->json($task);
});

Route::post('/tasks',function(Request $request){
    $task = App\Task::create($request->all());

    return response()->json($task);
});

Route::put('/tasks/{task_id?}',function(Request $request,$task_id){
    $task = App\Task::find($task_id);

    $task->task = $request->task;
    $task->description = $request->description;

    $task->save();

    return response()->json($task);
});

Route::delete('/tasks/{task_id?}',function($task_id){
    $task = App\Task::destroy($task_id);

    return response()->json($task);
});