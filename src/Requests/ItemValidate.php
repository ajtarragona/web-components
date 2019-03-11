<?php

namespace Ajtarragona\WebComponents\Requests;

use Ajtarragona\WebComponents\Requests\BaseRequest;

class ItemValidate extends BaseRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'name' => ['required','min:3'],
            'type_id' => 'required',
            'number' => 'required',
        ];
    }

}
