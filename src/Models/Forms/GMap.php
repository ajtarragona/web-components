<?php
namespace Ajtarragona\WebComponents\Models\Forms;

class GMap extends FormControl
{	
	public $tag ="div";

    public $size="500x300";
    
	public $attributes=[
		'name'=>'',
		'value'=>'',
		'type'=>'text',
		'title'=>'',
		'placeholder'=>'',
		'id'=>'',
        'class'=>'map-container',
        "zoom"=>15,
        // "size"=>"500x300",
        "maptype" => "roadmap",
        "format" => "PNG"  
	];

	protected function miniMap(){
        // dump($this->size);
        // dump($this->attributes);
        if($this->size) $this->attributes["size"]=$this->size;

        $options=array_only($this->attributes, ["zoom","size","maptype","format"]);
        $apikey=config('webcomponents.gmaps.api_key');

        // dd($this->center);
        $url="https://maps.googleapis.com/maps/api/staticmap?".http_build_query($options)."&key=".$apikey;
        
        if($this->markers){
            $markers=[];
            $center=0;
            foreach($this->markers as $marker){
                $center= $marker["location"]["lat"].",".$marker["location"]["lng"];
                $markers[]=$center;
            }
            $url.="&center=".$center."&markers=".implode("|",$markers);
        }else{
            $url.="&center=".$this->center;
        }

            
        return "<img src=\"".$url."\" />";
    }

	public function bodyReplaceHook(){
		$newdata=[];

		// if(isset($attributes["multiple"])) $newdata["multiple"]=$attributes["multiple"];
		// if(isset($attributes["url"])) $newdata["url"]=$attributes["url"];
		// if(isset($attributes["value"])) $newdata["value"]=$attributes["value"];
		// if(isset($attributes["valuename"])) $attributes["value"]=$attributes["valuename"];
		// if(isset($attributes["savevalue"])) $newdata["savevalue"]=$attributes["savevalue"];
		// if(isset($attributes["showvalue"])) $newdata["showvalue"]=$attributes["showvalue"];
		// if(isset($attributes["min-length"])) $newdata["min-length"]=$attributes["min-length"];
		
		
        $this->markers=$this->getAttribute("markers",[]);

		$this->center=$this->getAttribute("center",config('webcomponents.gmaps.tgn_coords'));
		$this->zoom=$this->getAttribute("zoom",config('webcomponents.gmaps.default_zoom'));
		$this->multiple=$this->getAttribute("multiple",false);
		
		// dump($multiple);
		
		
		$ret="";
        $ret.='<div class="map-container">';

        if($this->getAttribute("readonly",false) || $this->getAttribute("disabled",false) ){
            $ret.=$this->miniMap();
        }else{
        
            
            if($this->getAttribute("search",true)){
                $ret.='    <div class="map-search-input">';

                $ret.=input([],array_merge($this->data,[
                    'map' => "#".$this->getAttribute("id")
                ]));
                    
                $ret.='    </div>';
            }
                
                
            $ret.='    <input type="hidden" data-value data-map="#'.$this->attributes["id"].'" name="'.$this->attributes["name"].'" />';
            $ret.='   <div class="google-map" id="'.$this->attributes["id"].'"	';
            $ret.='    data-center="'. $this->center .'"';
            $ret.='    data-zoom="'. $this->zoom .'"';
            $ret.='    data-multiple="'. ($this->multiple?'true':'false') .'"';
            $ret.='    data-markers=\''. json_encode($this->markers) .'\'';
                $ret.='    data-click-add="true"';


            $ret.='    ></div>';
            $ret.='    <small class="coords-display border p-2  d-block bg-light text-muted text-right" ></small>';

            
            // $ret = new Input($attributes,$newdata);
        }
        $ret.='</div>';
		return $ret;//->render();
	}
	
	public function __construct($attributes=[], $data=[]){
		parent::__construct($attributes,$data);


		// if(isset($this->attributes['type']) && $this->attributes['type']=="color"){
		// 	$this->attributes["type"]="text";
		// 	$this->addClass("colorinput");
		// }

		// if(isset($this->attributes['type']) &&  $this->attributes['type']=="number"){
		// 	$this->attributes["type"]="text";
		// 	$this->addClass("number");
		// }
		
		// if(isset($this->attributes["multiple"]) && $this->attributes["multiple"] && !ends_with($this->attributes['name'],"[]")) $this->attributes["name"].="[]";
		//dump($this->attributes);
		
	}
	
}