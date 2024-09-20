<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRecordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'movement_id' => 'required|integer',
            'value' => 'required|numeric',
            'date' => 'required|date_format:Y-m-d H:i:s',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'É necessário informar um usuario para esse recorde pessoal.',
            'user_id.integer' => 'É necessário que o ID seja do tipo inteiro.',
            'movement_id.required' => 'É necessário informar um movimento para esse recorde pessoal.',
            'movement_id.integer' => 'É necessário que o ID seja do tipo inteiro.',
            'value.required' => 'É necessário informar um valor para esse recorde pessoal.',
            'value.numeric' => 'É necessário que seja informado um número da forma 0.0',
            'date.required' => 'É necessário informar uma data para esse recorde pessoal.',
            'date.date_format' => 'É necessário informar uma data do formato Y-m-d H:i:s (2024-01-01 00:00:00).',
        ];
    }
}
