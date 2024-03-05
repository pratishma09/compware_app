<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
            'client_name'=>['required','string',Rule::unique('clients', 'client_name')->ignore($id, 'id')],
            'client_image' => [ $this->isMethod('post') ? 'required' : 'sometimes',
            'mimes:jpg,jpeg,png','max:1000']
        ];
    }
}
