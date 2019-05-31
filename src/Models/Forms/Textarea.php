<?php
namespace Ajtarragona\WebComponents\Models\Forms;

class Textarea extends FormControl
{	
	public $tag ="textarea";
	public $closetag=true;
	
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

	
}