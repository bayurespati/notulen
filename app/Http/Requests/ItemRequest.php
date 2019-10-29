<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'project_id' => 'required|exists:projects,id',
            'ms_item_id' => 'required|exists:ms_items,id',
        ];
    }

    public function messages()
    {
        return[
            'project_id.required' => 'Project tidak ditemukan',
            'project_id.exists' => 'Project tidak ditemukan',
            'ms_item_id.required' => 'Item tidak ditemukan',
            'ms_item_id.exists' => 'Item tidak ditemukan',
        ];
    }
}
