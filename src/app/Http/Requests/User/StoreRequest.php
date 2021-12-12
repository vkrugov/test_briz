<?php

namespace App\Http\Requests\User;

use App\Rules\PhoneRule;
use Dingo\Api\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:45',
            'phone' => [
                'required',
                'string',
                'max:45',
                new PhoneRule()
            ],
        ];
    }
}
