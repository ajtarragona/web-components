<?php

namespace Ajtarragona\WebComponents\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

class ValidationController extends BaseController
{

	public function validate(Request $request){
		$class = $request->class;
        $class = str_replace('/','\\',$class);
        $my_request = new $class();
        $validator = Validator::make($request->all(),$my_request->rules(),$my_request->messages());
        $validator->setAttributeNames($my_request->attributes());
        if($request->ajax()){
            if ($validator->fails())
            {
                return response()->json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()

                ));
            }else{
                return response()->json(array(
                    'success' => true,
                ));
            }
        }
    }

}

