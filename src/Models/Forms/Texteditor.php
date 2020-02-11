<?php
namespace Ajtarragona\WebComponents\Models\Forms;

class Texteditor extends FormControl
{	
	public $tag ="textarea";
	public $closetag=true;
	
	public $attributes=[
		'name'=>'',
		'value'=>'',
		'title'=>'',
		'placeholder'=>'',
		'id'=>'',
        'class'=>'text-editor',
        'height'=>false,
        'style'=>''
	];

    public $data = [
        'air-mode'=>false,
		'toolbar' =>'simple',
		'air-mode' =>false,
		'hint-url' =>false,
		'hint-trigger' =>'{'
    ];
	
	public function bodyHook(){
		return $this->getAttribute("value");
	}


    public function __construct($attributes=[], $data=[]){
        parent::__construct($attributes,$data);

        if(isset($this->attributes['placeholder'])) $this->data["placeholder"]=$this->attributes['placeholder'];
        if(isset($this->attributes['readonly'])) $this->data["read-only"]=$this->attributes['readonly'];
        if(isset($this->attributes['toolbar'])) $this->data["toolbar"]=$this->attributes['toolbar'];
        if(isset($this->attributes['air-mode'])) $this->data["air-mode"]=$this->attributes['air-mode'];
        if(isset($this->attributes['hint-url'])) $this->data["hint-url"]=$this->attributes['hint-url'];
        if(isset($this->attributes['hint-trigger'])) $this->data["hint-trigger"]=$this->attributes['hint-trigger'];
        
        if(isset($this->attributes['height'])&& $this->attributes['height']){
            $this->data["height"]=$this->attributes['height'];
			// $this->attributes['style'].= ";height:".$this->attributes['height'];
        }

        // if(isset($this->attributes['min-height'])&& $this->attributes['min-height']){
		// 	$this->attributes['style'].= ";min-height:".$this->attributes['min-height'];
        // }
        

    
    }
}