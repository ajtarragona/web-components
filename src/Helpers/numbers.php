<?php 



if (! function_exists('_number')) {
	
	function _number($number=null){
		//dump(app()->getLocale());

	  	$formatStyle=\NumberFormatter::DECIMAL;
		$formatter= new \NumberFormatter(app()->getLocale(), $formatStyle);
		return $formatter->format($number);//proper output depending on locale
	}
}


