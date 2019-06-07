<?php
namespace Ajtarragona\WebComponents\Models\Components;

use Ajtarragona\WebComponents\Models\Components\Icon;

class Nav extends WebComponent
{

	
	protected $defaultattributes=[
		'id'=>'',
		'class'=>'tgn-nav',
		'navigation' => 'drilldown',
		'disposition' => 'vertical',
		'fullwidth' => false,
		'accordion' => false,
		'items' => [],
	];

	protected $defaultdata=[
		'dropdown-hover' => false,
		'hover-delay' => 800,
		'dropdown-direction' => 'right',
		'dropdown-vertical-direction' => 'bottom',
		'navigation' => 'drilldown',
		
	];

	protected $hiddenattributes = ["navigation",'fullwidth','disposition','items','accordion'];
	
	protected $view = 'nav';

	
	public function setItemsAttributes($items){
		if($items){
			//dump($items);
			foreach($items as $i=>$item){

				$items[$i]["navigation"] = $this->attributes["navigation"];
				$items[$i]["accordion"] = $this->attributes["accordion"];
				$items[$i]["disposition"] = $this->attributes["disposition"];
				if(isset($item["children"])){
					$items[$i]["children"] = $this->setItemsAttributes($item["children"]);
				}
			}
			//dump($items);
		}
		return $items;

	}

	public function __construct($attributes=[],$data=[]){

		
		parent::__construct($attributes,$data);

		$this->data['navigation']=$this->attributes['navigation'];

		if(!$this->attributes['id']) $this->attributes['id']=self::generateUid("nav");
		
		$this->attributes['class'].=" tgn-nav tgn-nav-".$this->attributes['navigation']." ";
		$this->attributes['class'].=(" ".$this->attributes['disposition']." ");
		$this->attributes['class'].=$this->attributes['fullwidth']?" fullwidth ":" ";

		$this->attributes["items"]=$this->setItemsAttributes($this->attributes["items"]);
		//dump($this);
	}


	protected function renderNavitem($item){
		$navitem = new NavItem($item);
		return $navitem->render();	
	}

	public function render($args=[]){
		
		$ret="";

		$ret.="<ul ";
		$ret.=" id=\"".$this->attributes['id']."\" ";
		$ret.=" class=\"".$this->attributes['class']."\" ";
		$ret.=renderAttributes($this->attributes, $this->hiddenattributes) . " " . renderData($this->data);
		$ret.="	> ";
		
		foreach($this->attributes["items"]  as $item){
			$ret.=$this->renderNavitem($item);
		}
		$ret.="</ul>";
		
		return $ret;
	}


}