<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
    public function rules():array
    {
        $id = $this->route('id');
        return [
            'blogs_name'=>['required','string',Rule::unique('blogs', 'blogs_name')->ignore($id, 'id'),
        ],
            'blogs_desc'=>'required',
            'blogs_slug' => [
                'required',
                'string',
                'max:255'
            ],
            'blogs_author'=>'required',
            'blogs_image' => [
                $this->isMethod('post') ? 'required' : 'sometimes',
                'mimes:jpg,jpeg,png',
            ],
        ];
    }
}
