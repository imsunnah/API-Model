<?php
// Note: This is a test Request file for validation
namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
			'age' => ['sometimes', 'integer'],
			'gender' => ['sometimes', 'string'],
        ];
    }
}
