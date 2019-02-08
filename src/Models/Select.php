<?php
namespace Ajtarragona\WebComponents\Models;

class Select extends WebComponent
{

	protected $defaultattributes=[
		'name'=>'unnamed',
		'value'=>'',
		'selected'=>[],
		'title'=>'',
		'placeholder'=>'--',
		'id'=>'',
		'class'=>'',
		'container'=>true,
		'containerclass'=>'',
		'label'=>false,
		'sidelabel'=>false,
		'disabled'=>false,
		'readonly'=>false,
		'required'=>true,
		'outlined'=>true,
		'size'=>'md',
		'multiple'=>false,
		'renderhelper' =>false,
	];

	protected $hiddenattributes = ["containerclass",'container','label','sidelabel','renderhelper','outlined','size'];
	
	protected $view = 'forms.select';


	public function __construct($attributes=[],$data=[]){
		parent::__construct($attributes,$data);

		if(!$this->attributes['id']) $this->attributes['id']='select_'.$this->attributes['name'];
		if($this->attributes["multiple"] && !ends_with($this->attributes['name'],"[]")) $this->attributes["name"].="[]";
		if(ends_with($this->attributes['id'],"[]")) $this->attributes['id']=str_replace("[]", "", $this->attributes['id']);
		if(!is_array($this->attributes['selected'])) $this->attributes['selected']=[$this->attributes['selected']];


	}

}