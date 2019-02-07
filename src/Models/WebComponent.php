<?php

namespace Ajtarragona\WebComponents\Models;

use Illuminate\Support\Str;

class WebComponent
{

	public $attributes;
	public $data;
	protected $defaults=[];
	
	public function __construct($attributes=[],$data=[]){
		$this->attributes=$attributes;
		$this->data=$data;

	}

	protected function viewPath($view){
		return config("webcomponents.views-namespace")."::".config("webcomponents.theme").".".$view;
	}

	protected function renderView($view,$attributes=[]){
		$path=$this->viewPath($view);
		$ret="";
		if(view()->exists($path) ){	
			$ret=str_replace(array("\n", "\r","\t"), '', view($path,$attributes)->render()); 
		}
		return $ret;
	}

	public static function generateUid($prefix=false){
		$ret= ($prefix?$prefix."-":""). Str::uuid();
		return $ret;//uniqid($prefix?$prefix."-":false);
	}


	protected function prepareAttributes($args){
		$this->attributes=array_merge($this->defaults,$args);
	}

    protected function renderAttributes($excluded=[]) {
    	return self::html_attributes($this->attributes,false,$excluded);
    }

    protected function renderData($excluded=[]) {
    	return self::html_attributes($this->data,"data",$excluded);
    }

    protected function isVisible(){
    	if(isset($this->attributes["visible"])){
    		return $this->attributes["visible"];
    	} 
    	return true;
    }

    public static function html_attributes($array=false, $prefix=false,$excluded=[]) {
		if(!$array) return;

		$ret="";

		foreach ($array as $k => $v)
		{	
			if(!in_array($k, $excluded)&& $v){
				$ret.=" ".($prefix?($prefix."-"):"").$k."=";

				if(is_array($v)){
					$ret.="'".json_encode($v)."' ";
			    }else{
			    	$ret.="\"".addslashes($v)."\" ";
			    }
			}
		    //$array[$prefix.'-'.$k] = $v;
		    //unset($array[$k]);
		}
	
		
		return $ret;

		/*var_dump($array);die();
	    return implode(' ', array_map(function ($key, $value) {
	        global $prefix;
					
	        if (is_array($value)) {
	            $value = implode(' ', $value);
	        }
			
	        return $key . "=" . ($value) . "";
	    }, array_keys($array), $array));*/
	}

	


	
















	


}