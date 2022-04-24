<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'before' => ['required', 'regex:/^(\d{4})-(\d{2})-(\d{2})$/'],
            'after' => ['required', 'regex:/^(\d{4})-(\d{2})-(\d{2})$/'],
        ];
    }

    public function messages()
    {
        return [
            'before.required' => 'Поле "До" обязательно к заполнению',
            'after.required' => 'Поле "От" обязательно к заполнению',
            'before.regex' => 'Неверный формат даты в поле "До"',
            'after.regex' => 'Неверный формат даты в поле "От"',
        ];
    }
}
