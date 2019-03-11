<?php
namespace Ajtarragona\WebComponents\Models\Components;

class Radio extends WebComponent
{



	protected $defaultattributes=[
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


	protected $hiddenattributes = ["containerclass",'container','label','sidelabel','renderhelper','outlined','size'];
	
	protected $view = 'forms.radio';


	public function __construct($attributes=[],$data=[]){
		parent::__construct($attributes,$data);

		if(isset($this->attributes['color'])) $this->attributes['class'].=" ".$this->attributes['color'];

		if(isset($this->attributes["options"])){
			$this->view='forms.radios';
			if(!$this->attributes['id']) $this->attributes['id']='radios_'.$this->attributes['name'];//.'_'.kebab_case($args['value']);
			if(!ends_with($this->attributes['name'],"[]")) $this->attributes['name'].="[]";
		}else{
			if(!$this->attributes['id']) $this->attributes['id']='radio_'.$this->attributes['name'].'_'.kebab_case($this->attributes['value']);
		}
		
	}


	


/*	public static function radios($args=false){
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
	}*/
}