<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'required',
            'code' => 'required|unique:projects,code,'.$this->id,
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'address.required' => 'Alamat harus diisi',
            'code.required' => 'Code harus diisi',
            'code.unique' => 'Code sudah ada',
            'name.required' => 'Nama harus diisi',
        ];
    }
}
