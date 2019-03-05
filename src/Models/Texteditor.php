<?php
namespace Ajtarragona\WebComponents\Models;

class Texteditor extends WebComponent
{

	protected $defaultattributes=[
		'name'=>'unnamed',
		'value'=>'',
		'title'=>'',
		'placeholder'=>'',
		'id'=>'',
		'class'=>'text-editor',
		'container'=>true,
		'containerclass'=>'',
		'label'=>false,
		'sidelabel'=>false,
		'disabled'=>false,
		'readonly'=>false,
		'required'=>false,
		'outlined'=>true,
		'theme'=>'snow',
		'height'=>false,
		'toolbar' =>'simple',
		'style' =>''
	];

	protected $hiddenattributes = ["containerclass",'container','label','outlined','sidelabel','height','toolbar','theme'];
	
	protected $view = 'forms.texteditor';


	public function __construct($attributes=[],$data=[]){
		parent::__construct($attributes,$data);
		if($this->attributes['height']){
			$this->attributes['style'].= ";height:".$this->attributes['height'];
		}
		if(!$this->attributes['id']) $this->attributes['id']='texteditor_'.$this->attributes['name'];
	}

	

}