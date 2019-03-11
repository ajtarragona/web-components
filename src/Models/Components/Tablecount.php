<?php
namespace Ajtarragona\WebComponents\Models\Components;

class Tablecount extends WebComponent
{


	protected $defaultattributes=[
		'align' =>'center',

	];
	protected $hiddenattributes = ["align"];
	
	protected $view = 'tablecount';


	
	public function __construct($attributes=[], $data=[]){
		parent::__construct($attributes,$data);
	}
	

}

