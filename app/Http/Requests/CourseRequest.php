<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
            'course_name' => ['required', 'string', Rule::unique('courses', 'course_name')->ignore($id, 'id'),
            ],
            'course_schedule' => 'required|in:Morning,Afternoon,Evening',
            'course_desc' => 'required',
            'course_logo' => [
                $this->isMethod('post') ? 'required' : 'sometimes',
                'mimes:jpg,jpeg,png',
            ],
            'course_startdate' => 'required|date',
            'course_enddate' => 'required|date|after:course_startdate',
            'course_fee' => 'required|integer|min:0',
            'course_pdf' => [
                $this->isMethod('post') ? 'required' : 'sometimes',
                'mimes:pdf', 'file',
            ],
            'team_id' => 'required|exists:teams,id',
            'coursecategory_id' => 'required|exists:coursecategories,id',
        ];
    }
}
