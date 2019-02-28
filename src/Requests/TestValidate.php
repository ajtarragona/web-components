<?php

namespace Ajtarragona\WebComponents\Requests;

use Ajtarragona\WebComponents\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class TestValidate extends BaseRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'campo_texto_mascara' => ['required'],
            'campo_texto3' => ['required','min:3'],
            'campo_texto4' => ['required','min:3','numeric']
        ];
    }

}
