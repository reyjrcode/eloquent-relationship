<?php

namespace App\Http\Requests\Postings;

use Illuminate\Foundation\Http\FormRequest;

class StorePosting extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|max:255',
            'content'=>'required|max:255',
            'postings_id'=>'required|max:255',
        ];
    }
}
