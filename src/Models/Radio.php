<?php
namespace Ajtarragona\WebComponents\Models;

class Radio extends WebComponent
{




	public static function radio($args=false){
		if(isset($args["showif"])  && !$args["showif"]) return;
		
		$defaults=[
			'name'=>'unnamed',
			'value'=>1,
			'checked'=>false,
			'title'=>'',
			'placeholder'=>'',
			'id'=>'',
			'class'=>'custom-control custom-radio',
			'container'=>false,
			'containerclass'=>'',
			'label'=>false,
			'sidelabel'=>false,
			'disabled'=>false,
			'readonly'=>false,
			'required'=>false,
			'outlined'=>true,
			'size'=>'md'
			
		];

		if(isset($args['class'])) $args['class'].=" ".$defaults['class'];
		$args=array_merge($defaults,$args);
		if(!$args['id']) $args['id']='radio_'.$args['name'].'_'.kebab_case($args['value']);

		if(isset($args['style'])) $args['class'].=" ".$args['style'];

		return view('components.bootstrap.forms.radio', $args);
	}









	public static function radios($args=false){
		if(isset($args["showif"])  && !$args["showif"]) return;
		
		$defaults=[
			'name'=>'unnamed',
			'checked'=>0,
			'options'=>[],
			'horizontal'=>false,
			'size'=>'md',
			'id'=>'',
			'class'=>'custom-control custom-radio',
			'container'=>true,
			'containerclass'=>'',
			'disabled'=>false,
			'readonly'=>false,
			'required'=>false,
			'outlined'=>false
			
		];

		if(isset($args['class'])) $args['class'].=" ".$defaults['class'];
		$args=array_merge($defaults,$args);

		if(!$args['id']) $args['id']='radios_'.$args['name'];//.'_'.kebab_case($args['value']);

		if(!ends_with($args['name'],"[]")) $args['name'].="[]";

		if(isset($args['style'])) $args['class'].=" ".$args['style'];

		return view('components.bootstrap.forms.radios', $args);
	}
}