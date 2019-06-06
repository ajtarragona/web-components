<?php
namespace Ajtarragona\WebComponents\Models\Forms;

class Textarea extends FormControl
{	
	public $tag ="textarea";
	public $closetag=true;
	public $autoheight=false;
	
	public $attributes=[
		'name'=>'',
		'value'=>'',
		'title'=>'',
		'placeholder'=>'',
		'id'=>'',
		'class'=>'form-control',
	];

	
	public function bodyHook(){
		return $this->getAttribute("value");
	}

	public function __construct($attributes=[],$data=[]){
		parent::__construct($attributes,$data);

		if($this->autoheight) $this->addClass('autoheight');
		
	}

	
}