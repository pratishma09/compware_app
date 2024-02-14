<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestCertificateRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            //
            'name' => ['required', 'string', Rule::unique('studentcertificates', 'name')->ignore($id, 'id'),
            ],
            'email' => 'required|email|max:255',
            'startdate'=>'required|date',
            'enddate'=>'required|date|after:startdate',
            'contact'=>'required|string',
            'duration'=>'required|string',
            'course_id' => 'required|exists:courses,id',
            'team_id' => 'required|exists:teams,id'
        ];
    }
}
