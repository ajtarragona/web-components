<?php
namespace Ajtarragona\WebComponents\Models\Components;

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
		'required'=>false,
		'outlined'=>true,
		'size'=>'md',
		'multiple'=>false,
		'renderhelper' =>false,
		'show-deselector' =>true,
		'live-search' => false,
		'width' => '100%',
		'actions-box' => false,
		'type' =>'default'
	];

	protected $hiddenattributes = ["containerclass",'container','label','sidelabel','renderhelper','outlined','size','show-deselector','options','data','icon','iconposition','live-search','width','actions-box','type'];
	
	protected $view = 'forms.select';


	public function __construct($attributes=[], $data=[]){
		parent::__construct($attributes,$data);

		if(!$this->attributes['id']) $this->attributes['id']='select_'.$this->attributes['name'];
		if($this->attributes["multiple"] && !ends_with($this->attributes['name'],"[]")) $this->attributes["name"].="[]";
		
		$this->data["show-deselector"] = $this->attributes["show-deselector"];
		$this->data["live-search"] = $this->attributes["live-search"];
		$this->data["actions-box"] = $this->attributes["actions-box"];
		$this->data["width"] = $this->attributes["width"];
		$this->data["style"] = 'btn-'.$this->attributes["type"];
		$this->data["size"] = $this->attributes["size"];
		$this->attributes["containerclass"].=" bg-".$this->attributes["type"];
		//dump($this->data);

		if(ends_with($this->attributes['id'],"[]")) $this->attributes['id']=str_replace("[]", "", $this->attributes['id']);
		if(!is_array($this->attributes['selected'])) $this->attributes['selected']=[$this->attributes['selected']];


	}

}