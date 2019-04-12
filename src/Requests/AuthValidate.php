<?php

namespace Ajtarragona\WebComponents\Requests;

use Ajtarragona\WebComponents\Requests\BaseRequest;

class AuthValidate extends BaseRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    /*public function messages(){
        return [
            'username.required' => 'El nom d\'usuari és obligatori!',
            //'email.email' => 'El format de l\'email no és correcte!',
            'password.required' => 'El camp password és obligatori!',
            'password.min' => 'El password ha de tenir 6 caracters!',
        ];
    }*/
}
