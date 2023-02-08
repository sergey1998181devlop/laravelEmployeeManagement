<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerCreateRequest extends FormRequest
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
            'name'     =>  'required|min:2|max:30',
            'surname'     =>  'required|min:1|max:40',
            'permission_id'     =>  'required|integer|exists:employers_permissions,id',
            'position_id'     =>  'required|integer|exists:employers_positions,id',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Enter :attribute (name required!)',
            'name.min' => 'the minimum number of characters is 2 for the name',
            'name.max' => 'the maximum number of characters is 30 for the surname',

            'surname.required' => 'Enter :attribute (surname required!)',
            'surname.min' => 'the minimum number of characters is 1 for the surname',
            'surname.max' => 'the maximum number of characters is 40 for the surname',

            'permission_id.exists' => 'This role does not exist',
            'position_id.exists' => 'This specialization does not exist',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name'
        ];
    }
}
