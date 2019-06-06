<?php
namespace Ajtarragona\WebComponents\Models\Components;


class Breadcrumb extends WebComponent
{

	
	protected $defaultattributes=[
		'id'=>'',
		'class'=>'breadcrumb mb-0 py-4 px-0 text-truncate',
		'items' => [],
	];

	protected $defaultdata=[
	];

	protected $hiddenattributes = ['items'];
	
	protected $view = 'breadcrumb';


	public function __construct($attributes=[],$data=[]){

		
		parent::__construct($attributes, $data);


		if(!$this->attributes['id']) $this->attributes['id']=self::generateUid("breadcrumb");
		
		$this->attributes['class'].=" breadcrumb mb-0 py-4 px-0 ";
		
		//$this->attributes["items"]=$$this->attributes["items"]);
		//dump($this);
	}

	protected function renderCrumb($item){
		$crumb = new Crumb($item);
		return $crumb->render();	
	}

	public function render($args=[]){
		$ret="<ol ";
		$ret.=" id=\"".$this->attributes['id']."\" ";
		$ret.=" class=\"".$this->attributes['class']."\" ";
		$ret.=renderAttributes($this->attributes, $this->hiddenattributes) . " " . renderData($this->data);
		$ret.=">";

		foreach($this->attributes["items"]  as $item){
			$ret.=$this->renderCrumb($item);
		}

		$ret.="</ol>";

		return $ret;

	}


}