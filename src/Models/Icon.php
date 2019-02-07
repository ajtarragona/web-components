<?php

namespace Ajtarragona\WebComponents\Models;

class Icon Extends WebComponent
{	

	private $iconname;
	

	private static function getIconHTML($text=false, $icon=false, $options=false){
		$iconposition="left";
		$iconcode="";
		$iconsize="md";
		$iconcolor="";

		$ret="";
		//dump($options);

		if(isset($icon) && $icon){
	
			if(isset($options->iconposition)) $iconposition=$options->iconposition;
			if(isset($options->iconsize)) $iconsize=$options->iconsize;
			if(isset($options->iconcolor)){
				$iconcolor=$options->iconcolor;
			}

			if($iconposition == "top" || $iconposition == "bottom") $iconcode.="<div class='btn-icon nav-icon p-a-sm '>";
			else $iconcode.="<span class='btn-icon nav-icon'>";
			if(isset($options->circleicon) && $options->circleicon){
				$iconcode.=self::circleicon($icon,['color'=>$iconcolor,'size'=>$iconsize]);
			}else{
				$iconcode.=self::icon($icon,['color'=>$iconcolor]);
			}
			if($iconposition == "top" || $iconposition == "bottom") $iconcode.="</div>";
			else $iconcode.="</span>";
				
		}

		if($iconposition == "top" || $iconposition == "bottom") $ret.="<div class='text-center'>";
		if($iconposition == "left" || $iconposition == "top") $ret.=$iconcode." ";
		
		if(isset($text) && $text) $ret.=' <span class="button-text nav-text">'.$text.'</span> ';

		if($iconposition == "right" || $iconposition == "bottom") $ret.=" ".$iconcode;
		if($iconposition == "top" || $iconposition == "bottom") $ret.="</div>";

		return $ret;

	}


	public function icon($iconname,$attributes=[]){
		$defaults=[
			'class'=>'icon',
			'style'=>'',
			'size' =>'md',
			'color'=>false,
			'bg-color'=>false,
			'circle'=>false
		];

		$this->iconname=$iconname;
		$this->attributes=array_merge($defaults,$attributes);



		return $this;
	}
	


    public function render(){
    	if(!$this->isVisible()) return;

    	$classes=[];
    	$cssstyle=[];

    	$type="fas";
		$attrs="";
		


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


		
		//color del icono
		if(isset($this->attributes["color"]) && $this->attributes["color"]){

			if(starts_with($this->attributes["color"],"#") || starts_with($this->attributes["color"],"rgb")){
				$cssstyle[]="color:".$this->attributes["color"];
			}else{
				$classes[]= 'text-'.$this->attributes["color"];
			}
			
			
		
		}


		//color de fondo
		if(isset($this->attributes["bg-color"]) && $this->attributes["bg-color"]){

			if(starts_with($this->attributes["bg-color"],"#") || starts_with($this->attributes["bg-color"],"rgb")){
				$cssstyle[]="background-color:".$this->attributes["bg-color"];
			}else{
				$classes[]= 'bg-'.$this->attributes["bg-color"];
			}
	
		
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


		$icon ='<i '.$this->renderAttributes(["size","color","bg-color","type","circle"]).' ></i>';
		

		
		return $icon;
	}




}