<?php

use Ajtarragona\WebComponents\Models\WebComponent;
use Ajtarragona\WebComponents\Models\Icon;
use Ajtarragona\WebComponents\Models\Input;
use Ajtarragona\WebComponents\Models\Textarea;
use Ajtarragona\WebComponents\Models\Select;
use Ajtarragona\WebComponents\Models\Checkbox;
use Ajtarragona\WebComponents\Models\Radio;
use Ajtarragona\WebComponents\Models\Nav;
use Ajtarragona\WebComponents\Models\NavItem;
use Ajtarragona\WebComponents\Models\Breadcrumb;
use Ajtarragona\WebComponents\Models\Crumb;
use \InvalidArgumentException as InvalidArgumentException;


if (! function_exists('renderAttributes')) {
	function renderAttributes($array=false,$excluded=[]) {
		return WebComponent::html_attributes($array,false,$excluded);
	}
}


if (! function_exists('renderData')) {
	function renderData($array=false,$excluded=[]) {
		return WebComponent::html_attributes($array,"data",$excluded);
	}
}

if (! function_exists('html_attributes')) {
	function html_attributes($array=false,$prefix=false,$excluded=[]) {
		return WebComponent::html_attributes($array,$prefix,$excluded);
	}
}


if (! function_exists('icon')) {
	function icon($iconname,$attributes=[],$data=[]){
		$icon=new Icon($iconname,$attributes,$data);
		return $icon->render();
	}
}


if (! function_exists('textAndIcon')) {
	function textAndIcon($text,$icon,$options=[]){
		return Icon::getIconHTML($text,$icon,$options);
	}
}


if (! function_exists('circleicon')) {
	function circleicon($iconname,$attributes=[],$data=[]){
		$attributes["circle"]=true;
		$icon = new Icon($iconname,$attributes,$data);
		return $icon->render();
	}
}



if (! function_exists('input')) {
	function input($attributes=[],$data=[]){
		$ret = new Input($attributes,$data);
		//dd($ret);
		return $ret->render();
	}
}



if (! function_exists('textarea')) {
	function textarea($attributes=[],$data=[]){
		$ret = new Textarea($attributes,$data);
		return $ret->render();
	}
}



if (! function_exists('select')) {
	function select($attributes=[],$data=[]){
		$ret = new Select($attributes,$data);
		return $ret->render();
	}
}



if (! function_exists('checkbox')) {
	function checkbox($attributes=[],$data=[]){
		$ret = new Checkbox($attributes,$data);
		return $ret->render();
	}
}


if (! function_exists('radio')) {
	function radio($attributes=[],$data=[]){
		$ret = new Radio($attributes,$data);
		return $ret->render();
	}
}

if (! function_exists('checkboxes')) {
	function checkboxes($attributes=[],$data=[]){
		$ret = new Checkbox($attributes,$data);
		return $ret->render();
	}
}

if (! function_exists('radios')) {
	function radios($attributes=[],$data=[]){
		$ret = new Radio($attributes,$data);
		return $ret->render();
	}
}



if (! function_exists('navitem')) {
	function navitem($attributes=[],$data=[]){
		$ret = new NavItem($attributes,$data);
		return $ret->render();
		//return HtmlHelper::navitem($navitem, $parentid, $navigation);
	}
}

if (! function_exists('nav')) {
	function nav($attributes=[],$data=[]){
		$ret = new Nav($attributes,$data);
		return $ret->render();

		//return HtmlHelper::nav($nav);
	}
}


if (! function_exists('breadcrumb')) {
	function breadcrumb($attributes=[],$data=[]){
		$ret = new Breadcrumb($attributes,$data);
		return $ret->render();
	}
}


if (! function_exists('crumb')) {
	function crumb($attributes=[],$data=[]){
		$ret = new Crumb($attributes,$data);
		return $ret->render();
	}
}



if (! function_exists('pagination')) {
	function pagination($args){
		return HtmlHelper::pagination($args);
	}
}

if (! function_exists('tablecount')) {
	function tablecount($args){
		return HtmlHelper::tablecount($args);
	}
}



if (! function_exists('currentpath')) {
	function currentpath($args=false){
		return request()->path();
	}
}




if (! function_exists('includeSrc')) {
	function includeSrc($p=false){
		try{
			$view= view($p);//->with('products', $products)->render();
			if($view){

				$path=$view->getPath();

				//echo $path;
				//if(strpos($p,".")===false) $path.=".blade.php";
				
				if(is_file($path)){
					return file_get_contents($path);
				}
			}
		}catch(InvalidArgumentException $e){
			return "";
		}
	}
}


