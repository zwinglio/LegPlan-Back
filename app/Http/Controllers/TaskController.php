<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json([
            'tasks' => $request->action->tasks,
            'initiative' => $request->initiative,
            'action' => $request->action->withoutRelations(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $task = $request->action->tasks()->create($request->validated());

        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request): \Illuminate\Http\JsonResponse
    {
        $task = $request->task;

        return response()->json([
            'task' => $task,
            'action' => $request->action,
            'initiative' => $request->initiative,
            'objective' => $request->objective,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request)
    {
        $task = $request->task;
        $task->update($request->validated());

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $task = $request->task;
        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully',
        ]);
    }
}
