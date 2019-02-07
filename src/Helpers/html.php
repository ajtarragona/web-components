<?php
use Ajtarragona\WebComponents\Models\WebComponent;
use Ajtarragona\WebComponents\Facades\Icon;


if (! function_exists('html_attributes')) {
	function html_attributes($array=false,$prefix=false) {
		return WebComponent::html_attributes($array,$prefix);
	}
}


if (! function_exists('icon')) {
	function icon($iconname,$attributes=[]){
		return Icon::icon($iconname,$attributes)->render();
	}
}


if (! function_exists('circleicon')) {
	function circleicon($iconname,$attributes=[]){
		$attributes["circle"]=true;
		return Icon::icon($iconname,$attributes)->render();
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



if (! function_exists('input')) {
	function input($args){
		return HtmlHelper::input($args);
	}
}



if (! function_exists('textarea')) {
	function textarea($args){
		return HtmlHelper::textarea($args);
	}
}



if (! function_exists('select')) {
	function select($args){
		return HtmlHelper::select($args);
	}
}



if (! function_exists('checkbox')) {
	function checkbox($args){
		return HtmlHelper::checkbox($args);
	}
}


if (! function_exists('radio')) {
	function radio($args){
		return HtmlHelper::radio($args);
	}
}

if (! function_exists('checkboxes')) {
	function checkboxes($args){
		return HtmlHelper::checkboxes($args);
	}
}

if (! function_exists('radios')) {
	function radios($args){
		return HtmlHelper::radios($args);
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