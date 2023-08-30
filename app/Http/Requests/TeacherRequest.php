<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //teacher
            'teacher_code' => 'required|string|unique:teachers,teacher_code',
            'address' => 'required|string',
            // user
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirmation_password' => 'required|same:password', // Ensure confirmation matches password
            'fname' => 'required|string',
            'lname' => 'required|string',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'photo' => 'required|image',
            'phone' => 'required|string',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            //student
            'teacher_code.required' => 'Teacher code is required.',
            'teacher_code.string' => 'Teacher code must be an string Like TD15.',
            'teacher_code.unique' => 'This teacher code is already in use.',
            'address.required' => 'Please provide an address.',
            'address.string' => 'Address must be a string.',
            // user
            'email.required' => 'Please provide an email address.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'Please provide a password.',
            'password.min' => 'Password must be at least 8 characters.',
            'confirmation_password.required' => 'Please confirm your password.',
            'confirmation_password.same' => 'Confirmation password does not match the password.',
            'fname.required' => 'Please provide a first name.',
            'lname.required' => 'Please provide a last name.',
            'gender.required' => 'Please select a gender.',
            'gender.in' => 'Invalid gender selection.',
            'dob.required' => 'Please provide a date of birth.',
            'dob.date' => 'Invalid date of birth format.',
            'photo.required' => 'Please provide a photo.',
            'photo.image' => 'Please upload an image file.',
            'phone.required' => 'Please provide a phone number.'
        ];
    }
    /*
    dob' => 'required|date_format:Y-m-d',
    'gender.in' => 'Please select a valid gender.',
    'photo.image' => 'The photo must be an image.',
    'photo.mimes' => 'The photo must be in JPEG, PNG, or JPG format.',
    'photo.max' => 'The photo size must not exceed 2 MB.',
    'dob' => 'required',
    */
    // protected function prepareForValidation()
    // {
    //     // Convert the "dob" field to a Carbon instance
    //     if ($this->has('dob')) {
    //         $this->merge([
    //             'dob' => Carbon::createFromFormat('d/m/Y', $this->input('dob'))->format('Y-m-d')
    //         ]);
    //     }
    // }
    
}