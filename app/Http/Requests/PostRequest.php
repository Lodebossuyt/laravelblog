<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|string|max:255',
            'body'=>'required|string|max:255',
            'categories'=>'required',
            'photo_id'=>'required',
        ];
    }
    public function messages(){
        return[
            'title.required' => 'Title is required! Please fill out!',
            'body.required' => 'Body is required! Please fill out!',
            'categories.required' => 'Categories is required! Please fill out!',
            'photo_id.required' => 'photo is required! Please add one!',
        ];
    }
}
