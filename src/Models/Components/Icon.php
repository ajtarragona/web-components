<?php

namespace Ajtarragona\WebComponents\Models\Components;

class Icon Extends WebComponent
{	

	private $iconname;
	
	protected $defaultattributes=[
		'class'=>'icon',
		'style'=>'',
		'size' =>'md',
		'color'=>false,
		'bg-color'=>false,
		'circle'=>false,
		'type' =>''
	];

	protected $defaultdata=[];

	protected $hiddenattributes = ["size","color","bg-color","type","circle","visible"];
	
	protected $view ='icon';

	protected $isImage=false;


	public function __construct($iconname,$attributes=[],$data=[]){
		$this->iconname=$iconname;

		
		parent::__construct($attributes,$data);


		if(starts_with(ltrim(strtolower($this->iconname)),"<img")){
			$this->isImage=true;
			return;
		}


		$classes=[];
    	$cssstyle=[];

    	
		$type="";

		//Si no empieza con bi- asumo que es fontawesome
		//Si no, es bootstrap icon
		if(!starts_with($this->iconname, 'bi-')){

			$type="fas";
		

			$tmp=explode(" ",$this->iconname);

			if(count($tmp)==2){
				$type=$tmp[0];
				$this->iconname=$tmp[1];
			}	
			if(!starts_with($this->iconname,"fa-")) $this->iconname="fa-".$this->iconname;



			//estilo del icono fontawesome
			$styles=["fas","far","fal","fab"];
			if(isset($this->attributes["type"]) && in_array($this->attributes["type"], $styles)){
				$type=$this->attributes["type"];
			}
			$classes[]="fa-icon";
		}else{
			$classes[]="bi-icon";
		}

		
		//color del icono
		if(isset($this->attributes["color"]) && $this->attributes["color"]){

			if(starts_with($this->attributes["color"],"#") || starts_with($this->attributes["color"],"rgb")){
				$cssstyle[]="color:".$this->attributes["color"];
			}else{
				$classes[]= 'text-'.$this->attributes["color"];
			}
			
			
		
		}else if($this->attributes["circle"]){
			$classes[]= 'text-white';
		}


		//color de fondo
		if(isset($this->attributes["bg-color"]) && $this->attributes["bg-color"]){

			if(starts_with($this->attributes["bg-color"],"#") || starts_with($this->attributes["bg-color"],"rgb")){
				$cssstyle[]="background-color:".$this->attributes["bg-color"];
			}else{
				$classes[]= 'bg-'.$this->attributes["bg-color"];
			}
	
		
		}else if($this->attributes["circle"]){
			$classes[]= 'bg-primary';
		}


		

		//fijo los atributos
		if($cssstyle){
			$this->attributes["style"] = implode(";",$cssstyle).";".$this->attributes["style"];
		}

		$classes[]=$type;
		$classes[]="size-".$this->attributes["size"];
		$classes[]=$this->iconname;
		if($this->attributes["circle"]) $classes[]="circle-icon";
		

		
		$this->attributes["class"] = implode(" ",$classes)." ".$this->attributes["class"];
	}
	

	



 
	public static function getIconHTML($text=false, $icon=false, $options=[]){
		
		$ret="";
		
		//dump($options);
		$iconcode="";

		$defaults=[
			"position"=>"left",
			"code"=>"",
			"size"=>"md",
			"color"=>"",
			"bg-color"=>"",
			"circle"=>false
		];

		$options=array_merge($defaults,$options);

		if($icon){
	
			if($options["position"] == "top" || $options["position"] == "bottom") $iconcode.="<div class='btn-icon nav-icon p-a-sm '>";
			else $iconcode.="<span class='btn-icon nav-icon'>";
			if($options["circle"]){
				$iconcode.=circleicon($icon,$options);
			}else{
				$iconcode.=icon($icon,$options);
			}
			if($options["position"] == "top" || $options["position"] == "bottom") $iconcode.="</div>";
			else $iconcode.="</span>";
				
		}

		if($options["position"] == "top" || $options["position"] == "bottom") $ret.="<div class='text-center'>";
		if($options["position"] == "left" || $options["position"] == "top") $ret.=$iconcode." ";
		
		if($text) $ret.='<span class="button-text nav-text">'.$text.'</span>';

		if($options["position"] == "right" || $options["position"] == "bottom") $ret.=" ".$iconcode;
		if($options["position"] == "top" || $options["position"] == "bottom") $ret.="</div>";

		return $ret;

	}

	public function render($args=[]){
		if($this->isImage) return $this->iconname;


		return "<i ". renderAttributes($this->attributes, $this->hiddenattributes) . " " . renderData($this->data) ."></i>";
		// me estalvio cargar la vista

		//else return parent::render($args);

	}


}