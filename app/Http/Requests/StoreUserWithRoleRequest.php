<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserWithRoleRequest extends FormRequest
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
            //

            'user_data.name' => 'required|string|max:255',
            'user_data.email' => 'required|string|max:255',
            'roles_ids' => 'required|array',
            'roles_ids.*' => 'exists:roles,id',
            // Assuming you have a "roles" table


        ];
    }
}