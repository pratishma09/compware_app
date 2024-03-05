<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollRequest extends FormRequest
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
            //
            'enroll_name' => 'required',
            'enroll_phone' => 'required',
            'enroll_email' => 'required|email',
            'course_id' => 'required|exists:courses,id',
            'enroll_schedule' => 'required|in:Morning,Afternoon,Evening',
        ];
    }
}
