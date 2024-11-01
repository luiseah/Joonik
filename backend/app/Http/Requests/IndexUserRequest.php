<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('viewAny', User::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            's' => ['string'],

            'orderBys' => ['sometimes', 'array'],
            'orderBys.*' => ['string', Rule::in('asc', 'desc') /*, Rule::enum(OrderByDirectionEnum::class)*/],

            'per_page' => ['integer', 'min:10', 'max:25'],
        ];
    }
}
