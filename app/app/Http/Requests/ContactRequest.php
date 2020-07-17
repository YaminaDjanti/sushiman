<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'nom'=>'required|min:3',
            'prenom'=>'required|min:3',
            'email'=>'required|email',
            'messageSubject'=>'required|min:3',
            'textMessage'=>'required|between:10,250',
            'consent'=>'accepted',
        ];
    }
}
