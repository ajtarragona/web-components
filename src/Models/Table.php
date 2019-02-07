<?php
namespace Ajtarragona\WebComponents\Models;

class Table extends WebComponent
{



	public static function tablecount($args){
		if(isset($args["showif"])  && !$args["showif"]) return;
		
		$defaults=[
			'class'=>"",
			'align' =>'center'
		];
		$args=array_merge($defaults,$args);

		//dd($args);
		return view('components.bootstrap.tablecount', $args);

	}
}