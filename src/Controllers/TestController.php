<?php

namespace Ajtarragona\WebComponents\Controllers; 

use App\Http\Controllers\Controller;


class TestController extends Controller
{

	
	protected function packageView($view){
		return view(config("webcomponents.views-namespace")."::".$view);
	}

	public function kitchen(){ 
		return $this->packageView("kitchen");
	}

	
}

