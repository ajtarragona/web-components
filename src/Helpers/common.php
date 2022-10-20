<?php
if(!function_exists('uses_trait')){
	function uses_trait($obj, $name){
		return  in_array($name, array_keys(class_uses($obj)));

	}
}