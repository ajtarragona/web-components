<?php 

if (! function_exists('isTrue')) {
	function isTrue($cond=null){

	 	if(!isset($cond)) return false;
	 	if($cond===true) return true;
	 	if(is_array($cond) || is_object($cond)) return false;
	 	if($cond==1) return true;
	 	if($cond=="1") return true;
	 	if(strtolower($cond)=="true") return true;
	 	return false;
	}
}


if (! function_exists('isFalse')) {
	function isFalse($cond=null) {
		if(!isset($cond)) return true;
		if($cond===false) return true;
		if(is_array($cond) || is_object($cond)) return false;
		
	 	if($cond===0) return true;
		if($cond==="0") return true;
		if(strtolower($cond)=="false") return true;
		return false;
	}
}

