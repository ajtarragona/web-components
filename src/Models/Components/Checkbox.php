<?php
namespace Ajtarragona\WebComponents\Models\Components;

use Illuminate\Support\Str;

class Checkbox extends WebComponent
{
	protected $defaultattributes=[
		'name'=>'unnamed',
		'value'=>1,
		'type'=>'checkbox',
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
		'color' => false
		
	];


	protected $hiddenattributes = ["containerclass",'container','label','outlined','size','sidelabel','renderhelper'];
	
	protected $view = 'forms.checkbox';

	

	public function __construct($attributes=[],$data=[]){
		parent::__construct($attributes,$data);
		if(isset($this->attributes['color'])) $this->attributes['class'].=" ".$this->attributes['color'];

		if(isset($this->attributes["options"])){
			$this->view='forms.checkboxes';
			if(!$this->attributes['id']) $this->attributes['id']='checkboxes_'.$this->attributes['name'];//.'_'.kebab_case($args['value']);
			if(!ends_with($this->attributes['name'],"[]")) $this->attributes['name'].="[]";
		}else{

			if(!$this->attributes['id']) $this->attributes['id']='checkbox_'.$this->attributes['name'].'_'.kebab_case($this->attributes['value']);
		}

	}


	// public function render($args=[]){
 //    	if(!$this->isVisible()) return;


 //    	$args=array_merge($args,['attributes'=>$this->attributes,'hiddenattributes'=>$this->hiddenattributes,'data'=>$this->data]);
 //    	$args=array_merge($args,$this->attributes);
 //    	//dump($args);
 //    	//dump($this->attributes);
 //    	if(isset($this->attributes["options"])){
 //    		return $this->renderView('forms.checkboxes', $args);
 //    	}else{
 //    		return $this->renderView($this->view, $args);
 //    	}
	// }

	
	public static function checkboxes($args=false){
		
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