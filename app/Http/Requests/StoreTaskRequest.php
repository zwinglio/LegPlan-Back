<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'priority' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'department_id' => 'required|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'description.required' => 'A description is required',
            'status.required' => 'A status is required',
            'priority.required' => 'A priority is required',
            'start_date.required' => 'A start date is required',
            'end_date.required' => 'An end date is required',
            'department_id.required' => 'A department is required',
        ];
    }
}
