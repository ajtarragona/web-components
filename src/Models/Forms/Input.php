<?php
namespace Ajtarragona\WebComponents\Models\Forms;

use Illuminate\Support\Str;

class Input extends FormControl
{	
	public $tag ="input";

	
	public $attributes=[
		'name'=>'',
		'value'=>'',
		'type'=>'text',
		'title'=>'',
		'placeholder'=>'',
		'id'=>'',
		'class'=>'form-control',
	];

	public function preHook(){
		if($this->getAttribute("type")=="file") return "<div class='custom-file'>";
	}

	public function postHook(){
		if($this->getAttribute("type")=="file"){
			return "<label class='custom-file-label' for='".$this->getAttribute("id")."'>".$this->getAttribute("placeholder","")."</label></div>";
		}
	}
	
	public function __construct($attributes=[], $data=[]){
		parent::__construct($attributes,$data);


		if(isset($this->attributes['type']) && $this->attributes['type']=="color"){
			if(!$this->hasClass("native")){
				$this->attributes["type"]="text";
				$this->addClass("colorinput");
			}
		}

		if(isset($this->attributes['type']) &&  $this->attributes['type']=="number"){
			if(!$this->hasClass("native")){
				$this->attributes["type"]="text";
				$this->addClass("number");
			}
		}
		
		if(isset($this->attributes["multiple"]) && $this->attributes["multiple"] && !Str::endsWith($this->attributes['name'],"[]")) $this->attributes["name"].="[]";
		//dump($this->attributes);
		
	}
	
}