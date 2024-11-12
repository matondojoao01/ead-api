<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupportReplyRequest extends FormRequest
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
            'description'=>['required'],
            'support'=>['required','exists:supports,id'],
        ];
    }
    public function messages()
    {
        return [
            'description.required'=>'The description field is required',
            'support.required'=>'The support field is required',
            'support.exists' => 'The selected support does not exist',
        ];
    }
}
