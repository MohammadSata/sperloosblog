<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:250'],
            'content' => ['required', 'string'],
            'image' => [($this->isMethod('PUT') ? 'nullable' : 'required'), 'image', 'max:2048']
        ];
    }
}
