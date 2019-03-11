<?php
namespace Ajtarragona\WebComponents\Models\Components;

class Pagination extends WebComponent
{


	protected $defaultattributes=[
		'theme'=>'bootstrap-4',
		'class'=>"",
		'type' =>'',
		'align' =>'center',
		'except' =>['page'],
		'paginationview' =>''
		
	];
	protected $hiddenattributes = ["theme",'type','align','except','paginationview'];
	
	protected $view = 'pagination';


	
	public function __construct($attributes=[], $data=[]){
		parent::__construct($attributes,$data);

		//$aligns=["left"=>"start","center"=>"center","right"=>"end","justify"=>"around"];
		
		if(isset($this->attributes["except"])) $this->attributes["except"]=array_merge($this->defaultattributes["except"],$this->attributes["except"]);
		
		
		$this->attributes['paginationview']=$this->attributes["type"]?($this->attributes["type"]."-".$this->attributes["theme"]):$this->attributes["theme"];
		
		//$this->attributes["align"]=$aligns[$this->attributes["align"]];

		// dump($this->attributes);
	}
	

}

