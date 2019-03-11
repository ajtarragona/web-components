<?php
namespace Ajtarragona\WebComponents\Models;

class BaseFilter{
	
	public function numFilters(){
		$num=0;
		$classname=get_called_class();
		$class=new $classname();
		$attrs= array_keys(call_user_func('get_object_vars', $class));
		
		foreach($attrs as $attr){
			if(isset($this->$attr) && $this->$attr!=$class->$attr) $num++;
		}
		
		return $num;
	}
	
	public function hasFilters(){
		return $this->numFilters()>0;
	}
}