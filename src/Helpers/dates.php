<?php 
use Carbon\Carbon;

if (! function_exists('_now')) {
	
	function _now(){
	 	return Carbon::now();
	}
}

if (! function_exists('_date')) {
	//data en format dd/mm/aaaa
	function _date($date=false){
		if(!$date) return _now();

		if(str_contains($date,"/")){
			$date=explode("/", $date);
			$carbon = Carbon::createFromDate($date[2], $date[1], $date[0]);
		}else{
			$carbon = new Carbon($date);
		}
	 	return $carbon; 
	}
}

if (! function_exists('_time')) {
	function _time($time=false){
	 	if(!$time) return _now();
		if(str_contains($time,":")){
			$time=explode(":", $time);
			$carbon =  Carbon::createFromTime($time[0], isset($time[1])?$time[1]:0, isset($time[2])?$time[2]:0);
		}else{
			$carbon = new Carbon($time);
		}
	 	return $carbon; 
	}
}

if (! function_exists('dateformat')) {
	
	function dateformat($date=null, $format='d/m/Y'){
	 	if($date && ($date instanceof Carbon)) return $date->format($format);
	 	return $date;
	}
}
if (! function_exists('timeformat')) {
	
	function timeformat($date=null, $format='H:i:s'){
	 	if($date && ($date instanceof Carbon)) return $date->format($format);
	 	return $date;
	}
}

if (! function_exists('datetimeformat')) {
	
	function datetimeformat($date=null, $format='d/m/Y H:i:s'){
	 	
	 	if($date && ($date instanceof Carbon)) return $date->format($format);
	 	return $date;
	}
}


