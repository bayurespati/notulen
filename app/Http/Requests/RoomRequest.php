<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'ms_room_id' => 'required|exists:ms_rooms,id',
        ];
    }

    public function messages()
    {
        return[
            'project_id.required' => 'Project harus diisi',
            'project_id.exists' => 'Project tidak ditemukan',
            'ms_room_id.required' => 'Room harus diisi',
            'ms_room_id.exists' => 'Room tidak ditemukan',
        ];
    }
}
