<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MsRoomRequest extends FormRequest
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
            'name' => 'required|unique:ms_rooms,name,'.$this->id,
            'code' => 'required|unique:ms_rooms,code,'.$this->id,
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Nama harus diisi',
            'name.unique' => 'Nama sudah ada',
            'code.required' => 'Kode harus diisi',
            'code.unique' => 'Kode sudah ada',
        ];
    }
}
