<?php
namespace Ajtarragona\WebComponents\Models;

class Input extends WebComponent
{
	public static function input($args=false){
		if(isset($args["showif"])  && !$args["showif"]) return;
		
		$defaults=[
			'name'=>'unnamed',
			'value'=>'',
			'type'=>'text',
			'title'=>'',
			'placeholder'=>'',
			'id'=>'',
			'class'=>'form-control',
			'containerclass'=>'',
			'container'=>true,
			'label'=>false,
			'sidelabel'=>false,
			'disabled'=>false,
			'multiple'=>false,
			'readonly'=>false,
			'required'=>false,
			'outlined'=>true,
			'size'=>'md'
			
		];
		//dump($args);
		if(isset($args['class'])) $args['class'].=" ".$defaults['class'];
		$args=array_merge($defaults,$args);
		if(!$args['id']) $args['id']='input_'.$args['name'];
		
		return view('components.bootstrap.forms.input', $args);
	}
	
}