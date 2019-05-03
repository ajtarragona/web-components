<?php 

if (! function_exists('language_items')) {
	function language_items(){
		if(!function_exists('language')) return [];
		
		$items=[];
		foreach (language()->allowed() as $code => $name){
	       $items[]=
	       [
	       		"title" => $name ,
	       		"active" => language()->getCode()==$code,
	       		"url" => language()->back($code)
	       ];
	       // <li class="nav-item"><a class="nav-link {{ language()->getCode()==$code?"active":""}}" href="{{ language()->back($code) }}">{{ $name }}</a></li>
			
	    }
	    return $items;
	}	
}