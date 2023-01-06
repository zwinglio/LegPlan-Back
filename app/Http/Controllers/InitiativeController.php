<?php

namespace App\Http\Controllers;

use App\Models\Initiative;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInitiativeRequest;
use App\Http\Requests\UpdateInitiativeRequest;

class InitiativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $initiatives = $request->objective->initiatives;

        return response()->json([
            'initiatives' => $initiatives,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInitiativeRequest $request)
    {
        $initiative = $request->objective->initiatives()->create($request->validated());

        return response()->json([
            'message' => 'Initiative created successfully',
            'initiative' => $initiative,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Initiative  $initiative
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return response()->json([
            'initiative' => $request->initiative,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Initiative  $initiative
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInitiativeRequest $request)
    {
        $request->initiative->update($request->validated());

        return response()->json([
            'message' => 'Initiative updated successfully',
            'initiative' => $request->initiative,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Initiative  $initiative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->initiative->delete();

        return response()->json([
            'message' => 'Initiative deleted successfully',
        ]);
    }
}
