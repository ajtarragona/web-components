<?php

namespace Ajtarragona\WebComponents\Controllers; 


use Illuminate\Http\Request;
use \Artisan;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{

	


	protected function publishPackageAssets(){
	  	if(config("webcomponents.autopublish")){
	  	  //Artisan::call('ajtarragona:prepare');
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