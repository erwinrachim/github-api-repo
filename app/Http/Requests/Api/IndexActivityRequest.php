<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexActivityRequest extends FormRequest
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
            'page' => [
                'filled',
                'integer',
                'min:1'
            ],
            'per_page' => [
                'filled',
                'integer',
                'min:0'
            ],
            'order' => [
                'filled',
                Rule::in(['asc', 'desc'])
            ],
        ];
    }
}
