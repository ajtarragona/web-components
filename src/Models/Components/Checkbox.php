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


}