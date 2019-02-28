<?php

namespace Ajtarragona\WebComponents\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
     protected function return($status,$response,$name="message",$httpstatus=200){
		return response()->json([
			'status' => $status,
			$name => $response
		], $httpstatus);

	}
}
