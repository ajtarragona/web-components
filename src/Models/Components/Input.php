<?php
namespace Ajtarragona\WebComponents\Models\Components;

class Input extends WebComponent
{	
	protected $defaultattributes=[
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
	protected $hiddenattributes = ["containerclass",'container','label','outlined','size','sidelabel'];
	
	protected $view = 'forms.input';


	
	public function __construct($attributes=[], $data=[]){
		parent::__construct($attributes,$data);


		if($this->attributes['type']=="color"){
			$this->attributes["type"]="text";
			$this->attributes["class"].=" colorinput";
		}

		if($this->attributes['type']=="number"){
			$this->attributes["type"]="text";
			$this->attributes["class"].=" number";
		}
		if(!$this->attributes['id']) $this->attributes['id']='input_'.$this->attributes['name'];
		if($this->attributes["multiple"] && !ends_with($this->attributes['name'],"[]")) $this->attributes["name"].="[]";
		// dump($this->attributes);
	}
	
}