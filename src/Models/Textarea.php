<?php
namespace Ajtarragona\WebComponents\Models;

class Textarea extends WebComponent
{

	public static function textarea($args=false){
		if(isset($args["showif"])  && !$args["showif"]) return;
		
		$defaults=[
			'name'=>'unnamed',
			'value'=>'',
			'title'=>'',
			'placeholder'=>'',
			'id'=>'',
			'class'=>'form-control',
			'container'=>true,
			'containerclass'=>'',
			'label'=>false,
			'sidelabel'=>false,
			'disabled'=>false,
			'readonly'=>false,
			'required'=>false,
			'outlined'=>true,
			'size'=>'md',
			'rows'=>3,
			'maxlength'=>''
		];

		if(isset($args['class'])) $args['class'].=" ".$defaults['class'];
		$args=array_merge($defaults,$args);
		if(!$args['id']) $args['id']='textarea_'.$args['name'];


		return view('components.bootstrap.forms.textarea', $args);
	}

}