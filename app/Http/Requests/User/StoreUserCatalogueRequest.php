<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserCatalogueRequest extends FormRequest
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
        $rules = [];

        if ($this->has('name')) {
            $rules['name'] = 'required|string|max:255';
        }

        if ($this->has('email')) {
            $rules['email'] = 'required|string|email|unique:user_catalogues|max:250';
        }

        if ($this->has('name_trans')) {
            $rules['name_trans'] = 'required|string|max:255';
        }

        if ($this->has('phone')) {
            $rules['phone'] = 'required|string|max:20';
        }

        if ($this->has('description_trans')) {
            $rules['description_trans'] = 'nullable|string|max:500';
        }

        return $rules;
    }

    public function messages() 
    {
        $validateMessages = __('validation_create.user_catalogue');

        return [
            'name.required' => $validateMessages['name']['required'],
            'name.string' => $validateMessages['name']['string'],
            'name.max' => $validateMessages['name']['max'],

            'name_trans.required' => $validateMessages['name']['required'],
            'name_trans.string' => $validateMessages['name']['string'],
            'name_trans.max' => $validateMessages['name']['max'],

            'email.required' => $validateMessages['email']['required'],
            'email.email' => $validateMessages['email']['email'],
            'email.unique' => $validateMessages['email']['unique'],
            'email.max' => $validateMessages['email']['max'],

            'phone.required' => $validateMessages['phone']['required'],
            'phone.string' => $validateMessages['phone']['string'],
            'phone.max' => $validateMessages['phone']['max'],

            'description.string' => $validateMessages['description']['string'],
            'description.max' => $validateMessages['description']['max'],

            'description_trans.string' => $validateMessages['description']['string'],
            'description_trans.max' => $validateMessages['description']['max'],
        ];
    }
}
