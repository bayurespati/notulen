<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
            'planned_date' => 'required',
            'actual_date' => 'required',
            'project_id' => 'required|exists:projects,id',
            'title' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'planned_date.required' => 'Tanngal perencanaan harus diisi',
            'general_note.required' => 'Catatan harus diisi',
            'actual_date.required' => 'Tanggal terjadi harus diisi',
            'project_id.required' => 'Project harus diisi',
            'project_id.exists' => 'Project tidak ditemukan',
            'title.required' => 'Judul harus diisi',
        ];
    }
}
