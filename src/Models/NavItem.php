<?php
namespace Ajtarragona\WebComponents\Models;

use Ajtarragona\WebComponents\Models\Icon;

class NavItem extends WebComponent
{

	
	protected $defaultattributes=[
		'id'=>'',
		'class'=>'nav-item',
		'linkclass'=>'',
		'navigation' => 'drilldown',
		'active' => false,
		'title' =>'',
		'route' => '',
		'url' =>'#',
		'icon' =>'',
		'visible' => true,
		'children' => [],
		'activeroute' => false,
		'activeurl' => false,
		'activematch' => false,
		'collapsed' =>true,
		'iconoptions' =>[], 
	];


	protected $hiddenattributes = ['navigation','visible','icon','url','route','active','activematch','activeroute','activeurl','children','collapsed','iconoptions'];
	
	protected $view = 'navitem';


	public function hasUrl(){
		return $this->attributes['url'] || $this->attributes['route'];
	}

	public function getChildren(){
		return $this->attributes["children"];
	}

	public function hasChildren(){
		return is_array($this->attributes["children"]) && count($this->attributes["children"])>0;
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

		if(!$this->attributes['id']) $this->attributes['id']=''.self::generateUid("navitem");
		
		$this->attributes['class'].="  ";

		$activeroute =$this->attributes["activeroute"]?true:($this->attributes["route"]?$this->attributes["route"]:false);
     	$activeurl =$this->attributes["activeurl"]?true:($this->attributes["url"]?$this->attributes["url"]:false);
     	$activematch =$this->attributes["activematch"]?true:false;

     	if($this->attributes["children"]) $this->attributes["class"].=" has-submenu ";

     	if($activematch){
     		$this->attributes['active'] = isActiveMatch($activematch);
	 	}else if($activeroute){
     		$this->attributes['active'] = isActiveRoute($activeroute);
     	}else if($activeurl){
     		$this->attributes['active'] = isActiveURL($activeurl);
     	}
		if($this->attributes['active']) $this->attributes["class"].=' active ';



		$linkclasses=['nav-link'];
		if($this->attributes['linkclass']) $linkclasses=explode(" ",$this->attributes['linkclass']);
		
		if(!$this->hasUrl() && $this->hasChildren()){
			if($this->attributes["navigation"]=="drilldown") $linkclasses[]="opener";
		}

		$this->attributes['linkclass']=implode(" ",$linkclasses);
		
	//	dump($this->attributes);
		

		
     }


   
     	

	

}

