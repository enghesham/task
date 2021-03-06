<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where(['user_id' => 1])->get();
       return response()->json([
           'tasks'    => $tasks,
       ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name'        => 'required',
           'description' => 'required',
       ]);
       $task = Task::create([
           'name'        => request('name'),
           'description' => request('description'),
           'user_id'     => 1
       ]);
       return response()->json([
           'task'    => $task,
           'message' => 'Success'
       ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
//        $this->validate($request, [
//           'name'        => 'required|max:255',
//           'description' => 'required',
//       ]);
       $task->name = request('name');
       $task->description = request('description');
       $task->Quantity = request('Quantity');
       $task->save();
       return response()->json([
           'message' => 'Task updated successfully!'
       ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
       return response()->json([
           'message' => 'Task deleted successfully!'
       ], 200);
    }
    
     public function inserttosala(Request $request)
    {
         $tasks = Task::where('Quantity' , '!=' , 0)->get();
       return $tasks;
    }
}
