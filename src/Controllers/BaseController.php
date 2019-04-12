<?php

namespace Ajtarragona\WebComponents\Controllers; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Artisan;


class BaseController extends Controller
{

	


	protected function publishPackageAssets(){
	  	if(config("webcomponents.autopublish")){
		  Artisan::call('vendor:publish', [
		      '--tag' => 'ajtarragona-web-components-assets', 
		      '--force' => 1
		  ]);
		}
	}
	
	public function view($view, $args=[]){
		return view("ajtarragona-web-components::".$view, $args);
	}

	// public function home(){ 
 //      $this->publishPackageAssets();
 //      return $this->view("home");
 //  	}
}