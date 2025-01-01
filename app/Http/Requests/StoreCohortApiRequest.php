<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCohortApiRequest extends FormRequest
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
            'title' => "required",
            'student_number' => "required",
            'duration' => "required",
            'country' => "required",
            'image_path' => "required",
            'start_date' => "required|date",
            'end_date' => "required|date",
            'cohort_category_id' => "required"
        ];
    }
}
