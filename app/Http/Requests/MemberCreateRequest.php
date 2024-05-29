<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MemberCreateRequest extends FormRequest
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
            'fullname' => ['required', 'string', 'max:100', 'unique:members'],
            'address' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'string', 'max:10'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'string', 'max:15']
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        
    } 

} 

