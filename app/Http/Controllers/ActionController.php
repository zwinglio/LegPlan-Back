<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Objective;
use App\Models\Perspective;
use App\Http\Requests\StoreActionRequest;
use App\Http\Requests\UpdateActionRequest;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json([
            'actions' => $request->initiative->actions,
            'initiative' => $request->initiative->withoutRelations(),
            'objective' => $request->objective,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreActionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActionRequest $request)
    {
        $action = $request->initiative->actions()->create($request->validated());

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
    public function show(Request $request)
    {
        return response()->json([
            'message' => 'Action retrieved successfully',
            'action' => $request->action,
            'initiative' => $request->initiative,
            'objective' => $request->objective,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActionRequest  $request
     * @param  \App\Models\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActionRequest $request)
    {
        $action = $request->action;
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
    public function destroy(Request $request)
    {
        $request->action->delete();

        return response()->json([
            'message' => 'Action deleted successfully',
        ], 200);
    }
}
