<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $company = Company::all()->first();
        return response()->json([
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $company = Company::first();
        $company->update($request->only(['name', 'mission', 'vision', 'values', 'plan_start_date', 'plan_end_date']));

        return response()->json([
            'message' => 'Company updated successfully',
            'company' => $company,
        ]);
    }
}
