<?php

use Ajtarragona\WebComponents\Models\Components\WebComponent;
use Ajtarragona\WebComponents\Models\Components\Icon;
use Ajtarragona\WebComponents\Models\Components\Nav;
use Ajtarragona\WebComponents\Models\Components\NavItem;
use Ajtarragona\WebComponents\Models\Components\Breadcrumb;
use Ajtarragona\WebComponents\Models\Components\Crumb;
use Ajtarragona\WebComponents\Models\Components\Pagination;
use Ajtarragona\WebComponents\Models\Components\Tablecount;
use Ajtarragona\WebComponents\Facades\MainMenu;

use \InvalidArgumentException as InvalidArgumentException;

use Ajtarragona\WebComponents\Models\Forms\Textarea;
use Ajtarragona\WebComponents\Models\Forms\Texteditor;
use Ajtarragona\WebComponents\Models\Forms\Input;
use Ajtarragona\WebComponents\Models\Forms\Select;
use Ajtarragona\WebComponents\Models\Forms\Checkbox;
use Ajtarragona\WebComponents\Models\Forms\FormControl;
use Ajtarragona\WebComponents\Models\Forms\GMap;
use Ajtarragona\WebComponents\Models\Forms\Radio;

if (! function_exists('renderAttributes')) {
	function renderAttributes($array=false,$excluded=[]) {
		return WebComponent::html_attributes($array,false,$excluded);
	}
}


if (! function_exists('renderData')) {
	function renderData($array=false,$excluded=[]) {
		//dump($array);
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


if (! function_exists('texteditor')) {
	function texteditor($attributes=[],$data=[]){
		$ret = new Texteditor($attributes,$data);
		return $ret->render();
	}
}



if (! function_exists('select')) {
	function select($attributes=[],$data=[]){
		$ret = new Select($attributes,$data);
		return $ret->render();
	}
}



if (! function_exists('autocomplete')) {
	function autocomplete($attributes=[],$data=[]){
		if(!isset($attributes["class"])) $attributes["class"]="";
		$attributes["class"].=" autocomplete";

		$newdata=[];

		if(isset($attributes["multiple"])) $newdata["multiple"]=$attributes["multiple"];
		if(isset($attributes["url"])) $newdata["url"]=$attributes["url"];
		if(isset($attributes["value"])) $newdata["value"]=$attributes["value"];
		if(isset($attributes["valuename"])) $attributes["value"]=$attributes["valuename"];
		if(isset($attributes["savevalue"])) $newdata["savevalue"]=$attributes["savevalue"];
		if(isset($attributes["showvalue"])) $newdata["showvalue"]=$attributes["showvalue"];
		if(isset($attributes["min-length"])) $newdata["min-length"]=$attributes["min-length"];
		if(isset($attributes["highlight"])) $newdata["highlight"]=isTrue($attributes["highlight"]);

		$newdata=array_merge($newdata,$data);
		
		$ret = new Input($attributes,$newdata);
		return $ret->render();
	}
}





if (! function_exists('gmap')) {
	function gmap($attributes=[],$data=[]){
		// if(!isset($attributes["class"])) $attributes["class"]="";
		// $attributes["class"].=" autocomplete";
		$ret = new GMap($attributes,$data);
		return $ret->render();
		
	}
}


if (! function_exists('fileinput')) {
	function fileinput($attributes=[],$data=[]){
		if(!isset($attributes["class"])) $attributes["class"]="";
		$attributes["class"].=" custom-file-input ";
		$attributes["type"]="file";

		$ret = new Input($attributes,$data);
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
		$val= $ret->render();
		// dump($val);

		return $val;
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
	function pagination($attributes=[],$data=[]){
		$ret = new Pagination($attributes,$data);
		return $ret->render();
	}
}

if (! function_exists('tablecount')) {
	function tablecount($attributes=[],$data=[]){
		$ret = new Tablecount($attributes,$data);
		return $ret->render();
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



if (! function_exists('makeLinks')) {
	function makeLinks($str, $linkname=False,$attributes=[]) {
		$hostRegex = "([a-z\d][-a-z\d]*[a-z\d]\.)*[a-z][-a-z\d]*[a-z]";
	    $portRegex = "(:\d{1,})?";
	    $pathRegex = "(\/[^?<>#\"\s]+)?";
	    $queryRegex = "(\?[^<>#\"\s]+)?";

	    $urlRegex = "/(?:(?<=^)|(?<=\s))((ht|f)tps?:\/\/" . $hostRegex . $portRegex . $pathRegex . $queryRegex . ")/";
	   	
	   	if($linkname){
	    	return preg_replace($urlRegex, "<a ".renderAttributes($attributes)." href=\"\\1\">".$linkname."</a>", $str);
	    }else{
	    	return preg_replace($urlRegex, "<a ".renderAttributes($attributes)." href=\"\\1\">\\1</a>", $str);
	    }
	    
	}
}


if (! function_exists('appVersion')) {
	function appVersion($param=false) {
		try{
			return \Tremby\LaravelGitVersion\GitVersionHelper::getNameAndVersion();
		}catch(\Exception $e){
			return "Unversioned";
		}
	}
}

