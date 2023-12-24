<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'team_name' => 'required|string|max:255',
            'team_post' => 'required|string|max:255|in:Team,Trainer',
            'team_role' => 'required|string|max:255',
            'team_email' => 'required|email|max:255',
            'team_description' => 'required|string',
            'team_signature' => [ $this->isMethod('post') ? 'required' : 'sometimes',
            'mimes:jpg,jpeg,png','max:2048'],
            'team_image' => [ $this->isMethod('post') ? 'required' : 'sometimes',
            'mimes:jpg,jpeg,png','max:2048'], // Adjust based on your image requirements
        ];
    }
}
