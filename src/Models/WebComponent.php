<?php

namespace Ajtarragona\WebComponents\Models;

use Illuminate\Support\Str;

class WebComponent
{

	public $attributes;
	public $data;
	protected $defaultattributes=[];
	protected $defaultdata=[];
	protected $hiddenattributes = []; //hidden attributes (do not render)
	protected $view = '';

	public function __construct($attributes=[],$data=[]){
		//$this->attributes=$attributes;
		//$this->data=$data;
		$this->prepareAttributes($attributes);
		$this->prepareData($data);
	}

	protected function viewPath($view){
		return "ajtarragona-web-components::".config("webcomponents.theme").".".$view;
	}
	


	public function render($args=[]){
    	if(!$this->isVisible()) return;


    	$args=array_merge($args,['attributes'=>$this->attributes,'hiddenattributes'=>$this->hiddenattributes,'data'=>$this->data]);
    	$args=array_merge($args,$this->attributes);
    	$args["object"]=$this;
    	//dump($args);
    	return $this->renderView($this->view, $args);
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


	protected function prepareAttributes($attributes){
		//if(isset($attributes['class'])) $this->attributes['class']=$this->attributes['class'] . 
		$this->attributes=array_merge($this->defaultattributes,$attributes);
	}

	protected function prepareData($data){
		$this->data=array_merge($this->defaultdata,$data);
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

    	/*	if(isset($navitem->role)){
			if(!Auth::user()) return;
			if(!Auth::user()->hasRole($navitem->role)) return;
		}


		if(isset($navitem->permission)){
			if(!Auth::user()) return;
			if(!Auth::user()->hasPermission($navitem->permission)) return;
		}*/
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