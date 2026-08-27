<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => ['required', 'string', 'max:30', 'unique:students,student_id'],
            'first_name' => ['required', 'string', 'max:100'],
            'middle_name' => ['nullable', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'mobile_number' => ['required', 'digits_between:10,15'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'in:Male,Female,Prefer not to say'],
            'program' => ['required', 'in:BSIT,BSCS,BSIS,BSEMC'],
            'year_level' => ['required', 'integer', 'between:1,4'],
            'address' => ['required', 'string', 'max:500'],
            'profile_picture' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.unique' => 'This student ID is already registered.',
            'email.unique' => 'This email address is already registered.',
            'mobile_number.digits_between' => 'Enter a mobile number containing 10 to 15 digits.',
            'profile_picture.max' => 'The profile picture must not exceed 2 MB.',
        ];
    }
}
