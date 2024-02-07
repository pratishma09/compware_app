<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
            'contact_name'=>'required|string|max:255',
            'contact_number'=>'required|string|max:255',
            'contact_email'=>'required|email|max:255',
            'contact_message'=>'required|string',
            // 'g-recaptcha-response' => [
            //     'required',
            //     'captcha',
            // ],

        ];
    }
}
