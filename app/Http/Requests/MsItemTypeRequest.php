<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MsItemTypeRequest extends FormRequest
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
            'code' => 'required|unique:ms_item_type,code,'.$this->id,
            'name' => 'required|unique:ms_item_type,name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Code harus diisi',
            'code.unique' => 'Code sudah ada',
            'name.required' => 'Nama harus diisi',
            'name.unique' => 'Nama sudah ada',
        ];
    }
}
