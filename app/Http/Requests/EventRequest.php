<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
                'event_name'=>['required','string'],
                'event_desc'=>'required',
                'event_ep'=>'required',
                'event_image' => [
                    $this->isMethod('post') ? 'required' : 'sometimes',
                    'mimes:jpg,jpeg,png,svg',
                ],
                'event_role'=>'required'
        ];
    }
}
