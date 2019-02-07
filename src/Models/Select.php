<?php
namespace Ajtarragona\WebComponents\Models;

class Select extends WebComponent
{

	public static function select($args=false){
		if(isset($args["showif"])  && !$args["showif"]) return;
		
		$defaults=[
			'name'=>'unnamed',
			'value'=>'',
			'selected'=>[],
			'title'=>'',
			'placeholder'=>'--',
			'id'=>'',
			'class'=>'',
			'container'=>true,
			'containerclass'=>'',
			'label'=>false,
			'sidelabel'=>false,
			'disabled'=>false,
			'readonly'=>false,
			'required'=>true,
			'outlined'=>true,
			'size'=>'md',
			'multiple'=>false,
			'renderhelper' =>false,
		];

		if(isset($args['class'])) $args['class'].=" ".$defaults['class'];
		$args=array_merge($defaults,$args);

		if($args["multiple"] && !ends_with($args['name'],"[]")) $args["name"].="[]";

		if(!$args['id']) $args['id']='select_'.$args['name'];
		if(ends_with($args['id'],"[]")) $args['id']=str_replace("[]", "", $args['id']);


		if(!is_array($args['selected'])) $args['selected']=[$args['selected']];

		return view('components.bootstrap.forms.select', $args);
	}
}