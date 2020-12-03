<?php 

if (! function_exists('isJson')) {
	function isJson($string) {
	 	try{
			if(!is_string($string)) return false;
			$ret=json_decode($string);
			if(!is_array($ret) && !is_object($ret)) return false; //es un tipo simple
			 
			return (json_last_error() == JSON_ERROR_NONE);
		}catch(Exception $e){
			return false;
		}
	}
}


if (! function_exists('json_pretty')) {
	function json_pretty($string) {
	 	return json_encode($string, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}
}

if (! function_exists('to_object')) {
	function to_object($array) {
		return json_decode(json_encode($array), FALSE);
		
	}
}



if (! function_exists('to_array')) {
	function to_array($object) {
	 	return json_decode(json_encode($object), true);
	}
}

if (! function_exists('get_property')) {

	function get_property($opt,$object){
		if (strpos($opt,'.') === FALSE ) {
			if(!property_exists($object,$opt)) return false;
			return $object->$opt;
		}else{
			$opts=explode(".",$opt);
			$tmp=$object;
			foreach($opts as $opt){
				if(!property_exists($tmp,$opt)) return false;
				$tmp=$tmp->$opt;
			}
			return $tmp;
		}
	}
}

if (! function_exists('is_assoc')) {

	function is_assoc($array){
		if(!$array) return false;
		if(!is_array($array)) return false;
		return !(array_values($array) === $array);

	}
}