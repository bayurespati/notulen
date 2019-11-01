<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MsItemDetailRequest extends FormRequest
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
            'name' => 'required|unique:ms_item_details,name,'.$this->id,
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Nama harus diisi',
            'name.unique' => 'Nama sudah ada',
        ];
    }
}
