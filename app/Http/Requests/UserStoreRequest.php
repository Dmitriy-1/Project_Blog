<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'=>'required|max:255',
            'surname'=>'required|max:255',
            'email'=>'required|email',
            'password'=>'min:8|max:50',
            'photo'=>'nullable|image',
            'instagram'=>'nullable',
            'twitter'=>'nullable',
            'description'=>'required',
        ];
    }
}
