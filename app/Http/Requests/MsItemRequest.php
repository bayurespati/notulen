<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MsItemRequest extends FormRequest
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
            'alternative_name' => 'required',
            'ms_item_type_id' => 'required|exists:ms_item_types,id',
            'code' => 'unique:ms_items,'.$this->id,
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'alternative_name.required' => 'Nama alternative harus diisi',
            'ms_item_type_id.required' => 'Tipe item harus diisi',
            'ms_item_type_id.exists' => 'Tipe item tidak ditemukan',
            'name.required' => 'Tanggal terjadi harus diisi',
            'code' => 'Kode sudah ada'
        ];
    }
}
