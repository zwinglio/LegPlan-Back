<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Objective;
use App\Models\Perspective;
use App\Http\Requests\StoreActionRequest;
use App\Http\Requests\UpdateActionRequest;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Perspective $perspective, Objective $objective)
    {
        $actions = $objective->actions;

        return response()->json([
            'actions' => $objective->actions,
            'objective' => $objective->withoutRelations(),
            'perspective' => $perspective,
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreActionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActionRequest $request, Perspective $perspective, Objective $objective)
    {
        $action = $objective->actions()->create($request->validated());

        return response()->json([
            'message' => 'Action created successfully',
            'action' => $action,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function show(Perspective $perspective, Objective $objective, Action $action)
    {
        return response()->json([
            'message' => 'Action retrieved successfully',
            'action' => $action,
            'objective' => $objective,
            'perspective' => $perspective,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActionRequest  $request
     * @param  \App\Models\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActionRequest $request, Perspective $perspective, Objective $objective, Action $action)
    {
        $action->update($request->validated());

        return response()->json([
            'message' => 'Action updated successfully',
            'action' => $action,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perspective $perspective, Objective $objective, Action $action)
    {
        $action->delete();

        return response()->json([
            'message' => 'Action deleted successfully',
        ], 200);
    }
}
