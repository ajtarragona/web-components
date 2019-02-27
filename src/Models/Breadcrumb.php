<?php
namespace Ajtarragona\WebComponents\Models;


class Breadcrumb extends WebComponent
{

	
	protected $defaultattributes=[
		'id'=>'',
		'class'=>'breadcrumb mb-0 py-4 px-0',
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


}