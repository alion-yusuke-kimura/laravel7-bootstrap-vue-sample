<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
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
            'code' => 'required|max:10',
            'name' => 'required|max:50',
            'name_kana' => 'nullable|regex:/^[ァ-ヶｦ-ﾟー]+$/u|max:50',
            'zip_code' => 'nullable|regex:/^[0-9]+$/|size:7',
            'address' => 'nullable|max:50',
            'building_name' => 'nullable|max:50',
            'tel' => 'nullable|regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/|max:13',
            'fax' => 'nullable|regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/|max:13',
        ];
    }

}
