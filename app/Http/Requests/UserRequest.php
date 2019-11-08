<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'current_position' => 'required',
            'primary_contact' => 'required',
            'password' => 'sometimes|required|min:8',
            'address' => 'required', 
            'email' => 'required|email|unique:companies,email,'.$this->id,
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'current_position.required' => 'Jabatan harus diisi',
            'primary_contact.required' => 'Kontak harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'address.required' => 'Alamat harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah ada',
            'email.email' => 'Format email salah',
            'name.required' => 'Nama harus diisi',
        ];
    }
}
