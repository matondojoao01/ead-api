<?php

namespace App\Http\Requests;

use App\Models\Support;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSupportRequest extends FormRequest
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
    public function rules(Support $support)
    {
        return [
            'lesson' => ['required', 'exists:lessons,id'],
            'status' => ['required', Rule::in(array_keys($support->statusOptions))],
            'description' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'lesson.required' => 'The lesson field is required',
            'lesson.exists' => 'The selected lesson does not exist',
            'status.required' => 'The status field is required',
            'status.in' => 'The selected status is invalid',
            'description.required' => 'The description field is required',
        ];
    }
}
