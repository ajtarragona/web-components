<?php
namespace Ajtarragona\WebComponents\Models\Components;

class Textarea extends WebComponent
{

	protected $defaultattributes=[
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
		'maxlength'=>'',
		'autoheight'=>false
	];

	protected $hiddenattributes = ["containerclass",'container','label','outlined','size','sidelabel'];
	
	protected $view = 'forms.textarea';


	public function __construct($attributes=[],$data=[]){
		parent::__construct($attributes,$data);

		if($this->attributes['autoheight']) $this->attributes['class'].=' autoheight';
		if(!$this->attributes['id']) $this->attributes['id']='textarea_'.$this->attributes['name'];
	}

	

}