<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class noteRequest extends FormRequest
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
    public function rules(): array {
        return [
            // Валидация данных
            "name" => "required|max:20|min:2",
            "header" => "required|min:4",
            "note" => "required|min:10|max:1000"
        ];
    }

    public function messages() {
        return [
            "name.required" => "Введите имя",
            "name.min" => "Имя должно быть минимум из 2-х символов",
            "name.max" => "Имя должно быть до 20 символов",

            "header.required" => "Введите тему заметки",
            "header.min" => "Тема заметик должна быть от 4-х символов",

            "note.required" => "Введите сообщение для заметки",
            "note.min" => "Заметка должна быть от 10 символов",
            "note.max" => "Заметка должна быть до 1000 символов"
        ];
    }
}
