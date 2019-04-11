<?php
namespace Ajtarragona\WebComponents\Models\Components;

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
		$theme=config("webcomponents.theme");
		return view('components.'.$theme.'.tablecount', $args);

	}
}