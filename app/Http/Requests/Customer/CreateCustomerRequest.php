<?php
// Note: This is a test Request file for validation
namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
			'age' => ['nullable', 'integer'],
			'gender' => ['required', 'string'],
        ];
    }
}
