<?php

namespace App\Http\Requests\Profile;

use App\Rules\PhoneRule;
use Dingo\Api\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:45',
            'phone' => [
                'sometimes',
                'required',
                'string',
                'max:45',
                new PhoneRule()
            ],
        ];
    }
}
