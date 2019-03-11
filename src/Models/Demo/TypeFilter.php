<?php
namespace Ajtarragona\WebComponents\Models\Demo;

use Ajtarragona\WebComponents\Models\BaseFilter;


class TypeFilter extends BaseFilter{
	public $textfilter;	
	
	public function __construct($filter=false)
	{
		$this->textfilter = false;
		
		if($filter){
			if(isset($filter["textfilter"])) $this->textfilter=$filter["textfilter"];
		}

	}
}