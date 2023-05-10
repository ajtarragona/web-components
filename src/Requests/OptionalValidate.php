<?php

namespace Ajtarragona\WebComponents\Requests;

use Ajtarragona\WebComponents\Requests\BaseRequest;

class OptionalValidate extends BaseRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'campo_texto3' => ['required'],
            
        ];
    }

}
