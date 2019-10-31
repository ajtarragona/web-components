<?php
namespace Ajtarragona\WebComponents\Models\Forms;

class Texteditor extends FormControl
{	
	public $tag ="div";
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
        'theme'=>'snow',
		'tools' =>'simple'
    ];
	
	public function bodyHook(){
		return $this->getAttribute("value");
	}


    public function __construct($attributes=[], $data=[]){
        parent::__construct($attributes,$data);

        if(isset($this->attributes['placeholder'])) $this->data["placeholder"]=$this->attributes['placeholder'];
        if(isset($this->attributes['readonly'])) $this->data["read-only"]=$this->attributes['readonly'];
        if(isset($this->attributes['toolbar'])) $this->data["tools"]=$this->attributes['toolbar'];
        if(isset($this->attributes['theme'])) $this->data["theme"]=$this->attributes['theme'];
        
        if(isset($this->attributes['height'])&& $this->attributes['height']){
			$this->attributes['style'].= ";height:".$this->attributes['height'];
        }

        if(isset($this->attributes['min-height'])&& $this->attributes['min-height']){
			$this->attributes['style'].= ";min-height:".$this->attributes['min-height'];
        }
        

    
    }
}