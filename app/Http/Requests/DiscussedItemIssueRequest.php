<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscussedItemIssueRequest extends FormRequest
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
            'discussed_item_id' => 'exists:discussed_items,id',
            'solution' => 'required',
            'details' => 'required',
            'title' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'discussed_item_id.exists' => 'Item tidak ditemukan',
            'solution.required' => 'Solusi harus diisi',
            'details.required' => 'Detail harus diisi',
            'title.required' => 'Judul harus diisi',
        ];
    }
}
