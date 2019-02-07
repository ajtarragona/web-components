<?php

use Ajtarragona\WebComponents\Models\WebComponent;
use Ajtarragona\WebComponents\Models\Icon;
use Ajtarragona\WebComponents\Models\Input;
use Ajtarragona\WebComponents\Models\Textarea;
use Ajtarragona\WebComponents\Models\Select;
use Ajtarragona\WebComponents\Models\Checkbox;
use Ajtarragona\WebComponents\Models\Radio;


if (! function_exists('html_attributes')) {
	function html_attributes($array=false,$prefix=false) {
		return WebComponent::html_attributes($array,$prefix);
	}
}


if (! function_exists('icon')) {
	function icon($iconname,$attributes=[],$data=[]){
		$icon=new Icon($iconname,$attributes,$data);
		return $icon->render();
	}
}


if (! function_exists('circleicon')) {
	function circleicon($iconname,$attributes=[],$data=[]){
		$attributes["circle"]=true;
		$icon=new Icon($iconname,$attributes,$data);
		return $icon->render();
	}
}



if (! function_exists('input')) {
	function input($attributes=[],$data=[]){
		$ret = new Input($attributes,$data);
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
		//return HtmlHelper::checkboxes($attributes,$data);
	}
}

if (! function_exists('radios')) {
	function radios($attributes=[],$data=[]){
		//return HtmlHelper::radios($attributes,$data);
	}
}


/*
if (! function_exists('navitem')) {
	function navitem($navitem, $parentid, $navigation="dropdown"){
		return HtmlHelper::navitem($navitem, $parentid, $navigation);
	}
}

if (! function_exists('nav')) {
	function nav($nav){
		return HtmlHelper::nav($nav);
	}
}


if (! function_exists('crumb')) {
	function crumb($items){
		return HtmlHelper::crumb($items);
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
*/