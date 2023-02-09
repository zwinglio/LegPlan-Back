<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use App\Models\Perspective;
use Illuminate\Http\Request;
use App\Http\Requests\StoreObjectiveRequest;
use App\Http\Requests\UpdateObjectiveRequest;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $objectives = $request->perspective->objectives;

        return response()->json([
            'objectives' => $objectives,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObjectiveRequest $request, Perspective $perspective)
    {
        $objective = $perspective->objectives()->create($request->validated());

        return response()->json([
            'message' => 'Objective created successfully 😉',
            'objective' => $objective,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Perspective $perspective, Objective $objective)
    {
        $objective = $perspective->objectives()->findOrFail($objective->id);

        return response()->json([
            'objective' => $objective,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateObjectiveRequest $request, Perspective $perspective, Objective $objective)
    {
        $objective->update($request->validated());

        return response()->json([
            'message' => 'Objective updated successfully',
            'objective' => $objective,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perspective $perspective, Objective $objective)
    {
        $objective->delete();

        return response()->json([
            'message' => 'Objective deleted successfully',
        ]);
    }
}
