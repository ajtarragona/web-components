<?php
namespace Ajtarragona\WebComponents\Models;

class MainMenu{
	
	protected $items;
	protected $session_varname = "mainmenu";


	public function __construct() { 
		$this->items=[];//session($this->session_varname,[]);
	}	

	protected function save(){
		//session([$this->session_varname,$this->items]);
	}

	public function addItem($item){
		$this->items[]=$item;
		//$this->save();
	}


	public function render(){
		// dd($this->items);
		return nav([
			"navigation"=> 'drilldown',
			'class'=>'nav-dark',
			"items"=> $this->items,
			'fullwidth'=>true
		]);
	}
	
}