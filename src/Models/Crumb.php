<?php
namespace Ajtarragona\WebComponents\Models;


class Crumb extends WebComponent
{

	
	protected $defaultattributes=[
		'id'=>'',
		'class'=>'breadcrumb-item',
		'active' => false,
		'title' =>'',
		'route' => '',
		'url' =>false,
		'icon' =>'',
	];


	protected $hiddenattributes = ['navigation','url','route','active'];
	
	protected $view = 'crumb';


	public function hasUrl(){
		return $this->attributes['url'] || $this->attributes['route'];
	}

	
	public function getUrl(){
		return $this->attributes['route']?route($this->attributes['route']):$this->attributes['url'];
	}
	
	public function getTitle(){
		//(isset($navitem->title)?$navitem->title:"")
		return $this->attributes['title'];
	}

	public function __construct($attributes=[],$data=[]){
		parent::__construct($attributes,$data);

		if(!$this->attributes['id']) $this->attributes['id']=''.self::generateUid("crumb");
		
		$this->attributes['class'].=" breadcrumb-item ";

		
     }


   
     	

	

}

