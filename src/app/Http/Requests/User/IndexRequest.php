<?php

namespace App\Http\Requests\User;

use Dingo\Api\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'limit' => 'int|max:100'
        ];
    }
}
