<?php

namespace App\Http\Controllers;

use App\Models\Perspective;
use Illuminate\Http\Request;
use App\Http\Requests\StorePerspectiveRequest;
use App\Http\Requests\UpdatePerspectiveRequest;

class PerspectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perspectives = Perspective::all()->load('objectives', 'objectives.initiatives', 'objectives.initiatives.actions.tasks');

        return response()->json([
            'perspectives' => $perspectives
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerspectiveRequest $request)
    {
        $perspective = Perspective::create($request->all());
        return response()->json($perspective, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Perspective $perspective)
    {
        return response()->json($perspective);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerspectiveRequest $request, Perspective $perspective)
    {
        $perspective->update($request->all());

        return response()->json([
            'message' => 'Perspective updated successfully',
            'perspective' => $perspective
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perspective $perspective)
    {
        $perspective->delete();

        return response()->json([
            'message' => 'Perspective deleted successfully',
            'perspective' => $perspective
        ]);
    }
}
