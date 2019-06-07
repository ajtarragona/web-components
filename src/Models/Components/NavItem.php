<?php
namespace Ajtarragona\WebComponents\Models\Components;

use Ajtarragona\WebComponents\Models\Components\Icon;

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

		$activeroute =$this->attributes["activeroute"]?$this->attributes["activeroute"]:($this->attributes["route"]?$this->attributes["route"]:false);
     	$activeurl =$this->attributes["activeurl"]?$this->attributes["activeurl"]:($this->attributes["url"]?$this->attributes["url"]:false);
     	$activematch =$this->attributes["activematch"]?$this->attributes["activematch"]:false;
     	//dump($this->attributes);
     	if($this->attributes["children"]) $this->attributes["class"].=" has-submenu ";

	 	if(!isset($this->attributes['active'])){
		 	if($activematch){
	     		$this->attributes['active'] = isActiveMatch($activematch);
		 	}else if($activeroute){
		 		//dump(isActiveRoute($activeroute));
	     		$this->attributes['active'] = isActiveRoute($activeroute);
	     	}else if($activeurl){
	     		$this->attributes['active'] = isActiveURL($activeurl);
	     	}
	    }
		if($this->attributes['active']) $this->attributes["class"].=' active ';

		
		//dump($this->attributes['active']);

		$linkclasses=['nav-link'];
		if($this->attributes['linkclass']) $linkclasses=explode(" ",$this->attributes['linkclass']);
		
		if(!$this->hasUrl() && $this->hasChildren()){
			if($this->attributes["navigation"]=="drilldown") $linkclasses[]="opener";
		}

		$this->attributes['linkclass']=implode(" ",$linkclasses);
		
	//	dump($this->attributes);
		

		
     }


	 public function render($args=[]){
		if(isset($this->attributes["separator"]) && $this->attributes["separator"]) return "<hr/>";

		$navigation=$this->attributes["navigation"];

		$ret="";
		
		$ret.="	<li ";
		$ret.="	id=\"{$this->attributes['id']}\"";
		$ret.="	class=\"{$this->attributes['class']}\"";
		$ret.=" >";
		if($url=$this->getUrl()){
				
			$ret.="<a href=\"{$url}\" title=\"{$this->getTitle()}\" data-placement='right' class=\"{$this->attributes["linkclass"]}\" >";
					
		}else{
			$ret.="<span title=\"{$this->getTitle()}\" data-placement='right' class=\"{$this->attributes["linkclass"]}\">";
		}
				
		$ret.= textAndIcon($this->getTitle(),$this->attributes['icon'],$this->attributes['iconoptions']);
					
		if($navigation=="drilldown" && $this->hasChildren()){
			if($this->hasUrl()){
				$ret.="<span class='opener'><span class='opener-icon'>".icon('arrow-right')."</span></span>";
			}else{
				$ret.="<span class='opener-icon'>".icon('arrow-right')."</span>";
			}
		}
						
		if($this->hasUrl()){
			$ret.="</a>";
		}else{
			$ret.="</span>";
		}

		$collapsed=$this->attributes["collapsed"];

		if($children=$this->getChildren()){
			if($navigation=="collapse" ){
				
				$ret.="	<div class='toggler ". ($collapsed?"collapsed":"") ."'  aria-expanded='true' data-toggle='collapse' href='#sub{$this->attributes['id']}' >".icon('angle-up')."</div>";
				$ret.="	<ul class='subnav collapse ". ($collapsed?"":"in") ." ' aria-expanded='true' id='sub{$this->attributes['id']}'>";
				
			}elseif($navigation=="drilldown"){

				$ret.="	<ul id='sub{$this->attributes['id']}'>";
				$ret.="		<li><a href='#' class='back'>".icon('arrow-left'). " " . __("tgn::strings.Back") ."</a></li>";
			}else{
				
				$ret.="	<div href='#' class='toggler' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' href='#sub{$this->attributes['id']}'>".icon('angle-up')."</div>";
				$ret.=" <ul class='dropdown-menu' id='sub{$this->attributes['id']}'>";
			}
			foreach ($children as $key => $item){
				$subitem = new NavItem($item);
				$ret.= $subitem->render();	
			}

			$ret.="</ul>";
		}

				
		$ret.="</li>";

		return $ret;

			
	 }

   
     	

	

}

