<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignPolicyRequest extends FormRequest
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
            'policy_id' => ['required', 'exists:policies,id'], // policy_id must exist in policies table
        ];
    }

    public function messages(): array
    {
        return [
            'policy_id.required' => 'The policy field is required.',
            'policy_id.exists' => 'The selected policy does not exist.',
        ];
    }

}
