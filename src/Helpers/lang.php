<?php 

if (! function_exists('language_flag')) {
	function language_flag($code=null, $attributes=[]){

		if($code){
			if(is_array($code)){
				$attributes=$code;
				$code=null;
			}else{
				$languages=language()->allowed();
				// dd($languages);
				if(isset($languages[$code])){
					$name=$languages[$code];
				}
			}
		}
		
		if(!$code){
			$code=language()->getCode();
		 	$name=language()->getName();
		}
		
		return '<img src="'.asset('vendor/ajtarragona/img/flags/'.$code.'.png').'" title="'.$name.'" '.renderAttributes($attributes).'/>';

	}	
}



if (! function_exists('language_items')) {
	function language_items(){
		if(!function_exists('language')) return [];
		
		$items=[];
		foreach (language()->allowed() as $code => $name){
	       $items[]=
	       [
	       		"code" => $code ,
	       		"title" => $name ,
	       		"active" => language()->getCode()==$code,
				"url" => language()->back($code),
				'icon' => ((language()->getCode()==$code)?'check-circle':'circle')
	       ];
	       // <li class="nav-item"><a class="nav-link {{ language()->getCode()==$code?"active":""}}" href="{{ language()->back($code) }}">{{ $name }}</a></li>
			
	    }
	    return $items;
	}	
}