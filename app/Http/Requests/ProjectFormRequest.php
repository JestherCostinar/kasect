<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
        $rules = [
            'project_name' => 'required|unique:listings,project_name',
            'website' => 'required',
            'developer' => 'required',
            'email' => ['required', 'email'],
            'telephone' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'logo' => ['mimes:png,jpg,jpeg', 'max:5048'],
            'description' => 'required',
        ];

        if (in_array($this->method(), ['POST'])) {
            $rules['logo'] = ['required', 'mimes:png,jpg,jpeg', 'max:5048'];
        }

        return $rules;

    }
}
