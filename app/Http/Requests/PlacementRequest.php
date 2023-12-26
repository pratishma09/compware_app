<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlacementRequest extends FormRequest
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
            'placement_name' => 'required|string|max:255',
            'placement_image' => [ $this->isMethod('post') ? 'required' : 'sometimes',
            'mimes:jpg,jpeg,png','max:1000']
        ];
    }
}
