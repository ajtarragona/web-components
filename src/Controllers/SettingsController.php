<?php

namespace Ajtarragona\WebComponents\Controllers;

use Illuminate\Http\Request;
use Ajtarragona\WebComponents\Controllers\ApiController;

use \Exception;

class SettingsController extends ApiController
{
     

     public function getSetting($name){
    	try{
    		$value = session($name);
    		return $this->return(1,$value,$name);
    	}catch(\Exception $e){
    		return $this->return(0,"Error getting variable","error",500);
    	}
    }

    public function setSetting(Request $request,$name){
    	try{
    		//var_dump($name);
    		//var_dump($request->all());
    		$val=$request->value;
    		if($val && $val!="false"){
    			session([$name=> $val]);
    			return $this->return(1,"Session variable $name set to value $val");
    		}else{
    			session()->forget($name);
    			return $this->return(1,"Session variable $name deleted");
    		}
    	}catch(\Exception $e){
    		return $this->return(0,"Error setting variable","error",500);
    	}
    }
}
