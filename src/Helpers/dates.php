<?php 
use Illuminate\Support\Carbon;

if (! function_exists('_now')) {
	
	function _now(){
	 	return Carbon::now();
	}
}

if (! function_exists('_date')) {
	
	function _date($date=null){
	 	if($date && ($date instanceof Carbon)) return $date->toDateString(); 
	 	return $date;
	}
}

if (! function_exists('_time')) {
	function _time($date=null){
	 	if($date && ($date instanceof Carbon)) return $date->toTimeString(); 
	 	return $date;
	}
}

if (! function_exists('dateformat')) {
	
	function dateformat($date=null){
	 	if($date && ($date instanceof Carbon)) return $date->format('d/m/Y');
	 	return $date;
	}
}
if (! function_exists('timeformat')) {
	
	function timeformat($date=null){
	 	if($date && ($date instanceof Carbon)) return $date->format('H:i:s');
	 	return $date;
	}
}

if (! function_exists('datetimeformat')) {
	
	function datetimeformat($date=null){
	 	
	 	if($date && ($date instanceof Carbon)) return $date->format('d/m/Y H:i:s');
	 	return $date;
	}
}


