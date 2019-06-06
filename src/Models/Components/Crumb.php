<?php
namespace Ajtarragona\WebComponents\Models\Components;


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

		$this->attributes['name']=isset($this->attributes['name'])?$this->attributes['name']:'';
		$this->attributes['icon']=isset($this->attributes['icon'])?$this->attributes['icon']:'';
	 }
	 
	 public function render($args=[]){
		$ret="";
		if($this->hasUrl()){
			$ret.="<a ";
			$ret.="	id=\"{$this->attributes['id']}\"";
			$ret.="	class=\"{$this->attributes['class']}\"";
			$ret.="	href=\"{$this->getUrl()}\" >";
			$ret.= textAndIcon($this->attributes['name'],$this->attributes['icon']);
			$ret.="</a>";

		}else{
			$ret.="<li ";
			$ret.="	id=\"{$this->attributes['id']}\"";
			$ret.="	class=\"{$this->attributes['class']}\"";		
			$ret.=textAndIcon($this->attributes['name'],$this->attributes['icon']);
					
			$ret.="</li>";
		}
		return $ret;
	 }


   
     	

	

}

