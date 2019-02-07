<?php
namespace Ajtarragona\WebComponents\Models;

use Illuminate\Support\Str;

class Checkbox extends WebComponent
{
	public static function checkbox($args=false){
		if(isset($args["showif"])  && !$args["showif"]) return;
		
		$defaults=[
			'name'=>'unnamed',
			'value'=>1,
			'checked'=>false,
			'title'=>'',
			'placeholder'=>'',
			'id'=>'',
			'class'=>'custom-control custom-checkbox',
			'container'=>false,
			'containerclass'=>'',
			'label'=>false,
			'sidelabel'=>false,
			'disabled'=>false,
			'readonly'=>false,
			'required'=>false,
			'outlined'=>true,
			'size'=>'md',
			'renderhelper' =>true,
			
		];

		if(isset($args['class'])) $args['class'].=" ".$defaults['class'];
		$args=array_merge($defaults,$args);
		if(!$args['id']) $args['id']='checkbox_'.$args['name'].'_'.kebab_case($args['value']);

		if(isset($args['style'])) $args['class'].=" ".$args['style'];

		return view('components.bootstrap.forms.checkbox', $args);
	}

		public static function checkboxes($args=false){
		if(isset($args["showif"])  && !$args["showif"]) return;
		
		$defaults=[
			'name'=>'unnamed',
			'checked'=>[],
			'options'=>[],
			'horizontal'=>false,
			'size'=>'md',
			'id'=>'',
			'class'=>'custom-control custom-checkbox',
			'container'=>true,
			'containerclass'=>'',
			'disabled'=>false,
			'readonly'=>false,
			'required'=>false,
			'outlined'=>false,
			'sidelabel'=>false,
			
			
		];

		if(isset($args['class'])) $args['class'].=" ".$defaults['class'];
		$args=array_merge($defaults,$args);

		if(!$args['id']) $args['id']='checkboxes_'.$args['name'];//.'_'.kebab_case($args['value']);

		if(!ends_with($args['name'],"[]")) $args['name'].="[]";

		if(isset($args['style'])) $args['class'].=" ".$args['style'];

		return view('components.bootstrap.forms.checkboxes', $args);
	}
}