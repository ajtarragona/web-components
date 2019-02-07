<?php

namespace Ajtarragona\WebComponents\Models;

use Illuminate\Support\Str;

class Breadcrumb extends WebComponent
{
	
	public $crumbs;
	protected $view = "breadcrumb";


	public function __construct($crumbs=[],$attributes=[],$data=[]){
		parent::__construct($attributes,$data);
		$this->crumbs=$crumbs;

	}
	private function renderCrumb($crumb){
		if(isset($item["showif"])  && !$item["showif"]) return;
		
		$ret="";
		$item=json_decode(json_encode($item, FALSE));
		$text=(isset($item->icon)?(self::icon($item->icon)." "):"").$item->name;
		if(isset($item->url)){
			$ret.= "<li class='breadcrumb-item'><a href='".$item->url."'>".$text."</a></li>";
		}else{
			$ret.= "<li class='breadcrumb-item active'>".$text."</li>";
		}
		return $ret;
	}


	
	public function render(){
		
		if(!$this->isVisible()) return;

		return $this->renderView($this->view, $this->attributes);

		// $ret="";
		// if($this->crumbs){
		// 	$ret.="<ol class='breadcrumb mb-0 py-4 px-0'>";
		// 	foreach($this->crumbs as $crumb){
		// 		$ret.=$this->renderCrumb($crumb);
		// 	}
		// 	$ret.="</ol>";
		// }
		// return $ret;
	}


}