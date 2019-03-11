<?php
namespace Ajtarragona\WebComponents\Models\Demo;

use Ajtarragona\WebComponents\Models\BaseFilter;


class ItemFilter extends BaseFilter{
	public $textfilter;	
	public $type_id;	
	public $number;	
	
	public function __construct($filter=false)
	{
		$this->textfilter = false;
		$this->type_id = false;
		$this->number = false;
		
		if($filter){
			if(isset($filter["textfilter"])) $this->textfilter=$filter["textfilter"];
			if(isset($filter["type_id"])) $this->type_id=$filter["type_id"];
			if(isset($filter["number"])) $this->number=$filter["number"];
		}

	}
}