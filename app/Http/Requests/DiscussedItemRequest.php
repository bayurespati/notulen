<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscussedItemRequest extends FormRequest
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
            'general_note' => 'required',
            'meeting_id' => 'required|exists:meetings,id',
            'dimension' => 'required',
            'diameter' => 'required',
            'item_id' => 'required|exists:items,id',
            'height' => 'required',
            'width' => 'required',
            'qty' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'general_note.required' => 'Catatan harus diisi',
            'meeting_id.required' => 'Meeting harus diisi',
            'meeting_id.exists' => 'Meeting tidak ditemukan',
            'dimension.required' => 'Dimensi harus diisi',
            'diameter.required' => 'Dimater harus diisi,'
            'item_id.required' => 'Item harus diisi',
            'item_id.exists' => 'Item tidak ditemukan',
            'height.required' => 'Tinggi harus diisi',
            'width.required' => 'Lebar harus diisi',
            'qty.required' => 'Jumlah harus diisi',
        ];
    }
}
