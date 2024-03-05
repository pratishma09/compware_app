<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TestimonialRequest extends FormRequest
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
            'testimonial_name' => ['required', 'string', Rule::unique('testimonials', 'testimonial_name')->ignore($id, 'id'),
            ],
            'testimonial_desc' => 'required',
            'testimonial_image' => [
                $this->isMethod('post') ? 'required' : 'sometimes',
                'mimes:jpg,jpeg,png',
            ],
            'course_id' => 'required|exists:courses,id',
        ];
    }
}
