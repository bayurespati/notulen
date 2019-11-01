<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'primary_contact' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:companies,email,'.$this->id,
            'name' => 'required|unique:companies,name,'.$this->id,
            'city' => 'required',
        ];
    }


    public function messages()
    {
        return[
            'primary_contact.required' => 'Kontak harus diisi',
            'address.required' => 'Alamat harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah ada',
            'email.email' => 'Format email salah',
            'name.required' => 'Nama harus diisi',
            'name.unique' => 'Nama sudah ada',
            'city.required' => 'Kota harus diisi',
        ];
    }

}
