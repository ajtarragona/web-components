<?php
namespace Ajtarragona\WebComponents\Models;

class Pagination extends WebComponent
{

	public static function pagination($args){
		if(isset($args["showif"])  && !$args["showif"]) return;
		
		$aligns=["left"=>"start","center"=>"center","right"=>"end","justify"=>"around"];
		$defaults=[
			'theme'=>'bootstrap-4',
			'class'=>"",
			'type' =>'',
			'align' =>'center',
			'except' =>['page']
		];
		
		if(isset($args["except"])) $args["except"]=array_merge($args["except"],$defaults["except"]);
		$args=array_merge($defaults,$args);

		
		$args['paginationview']=$args["type"]?($args["type"]."-".$args["theme"]):$args["theme"];
		$args["align"]=$aligns[$args["align"]];
		
		//dd($args);
		return view('components.bootstrap.pagination', $args);

	}
}