<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title'=>'required|unique:posts|max:255',
            'tag'=>'required|max:255',
            'text'=>'required',
            'image'=>'required|max:255',
            'dateCreateArticle'=>'required|date',
            'timeReadArticle'=>'required',
            'amountView'=>'required|integer',
        ];
    }
}
