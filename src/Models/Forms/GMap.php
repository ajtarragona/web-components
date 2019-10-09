<?php
namespace Ajtarragona\WebComponents\Models\Forms;

class GMap extends FormControl
{	
	public $tag ="div";

    public $inputicon;
    public $height="auto";   //for not readonly, width is always 100%
    public $size="500x300"; //for readonly, pixel dimensions


	public $attributes=[
		'name'=>'',
		'value'=>'',
		'type'=>'text',
		'title'=>'',
		'placeholder'=>'',
		'id'=>'',
        'class'=>'map-container',
        "zoom"=>15,
        "maptype" => "roadmap",
        "format" => "PNG" ,
        "addmarkerbtn" => true,
        "animation" => false,
        "geolocate" => true,
        "cluster" => false,
    
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
            $url.="&markers=".implode("|",$markers);
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
		$this->geolocate=$this->getAttribute("geolocate",true);
		// $this->animation=$this->getAttribute("animation",false);
		
		// dump($multiple);
		
		
		$ret="";
        $ret.='<div class="map-container">';

        if($this->getAttribute("readonly",false) || $this->getAttribute("disabled",false) ){
            $ret.=$this->miniMap();
        }else{
        
            if($this->getAttribute("search",true) || $this->getAttribute("addmarkerbtn",true)){
                $ret.="<div class='input-group map-search-input'>";
                
                if($this->getAttribute("search",true)){
                    $inputattrs=array_only($this->attributes, ["placeholder","inputclass"]);
                    $inputattrs["icon"]=$this->inputicon;
                    $inputattrs["containerclass"]='flex-grow-1';

                    $ret.=input($inputattrs, array_merge($this->data,[
                        'map' => "#".$this->getAttribute("id")
                        ]));
                        
                }
                    
                if($this->getAttribute("addmarkerbtn",true)){
                    $txt=$this->getAttribute("addmarkerbtntext", (icon('plus')." ".__("tgn::strings.Marcador")) );

                    $ret.="<div class='input-group-append'>";
                    $ret.="<button type='button' class='btn btn-light btn-sm add-marker-btn border' data-map='#".$this->attributes["id"]."' >". $txt."</button>";
                    $ret.="</div>";

                }

                $ret.="</div>";
            }   
            $ret.='    <input type="hidden" data-value data-map="#'.$this->attributes["id"].'" name="'.$this->attributes["name"].'" />';
            $ret.='   <div class="google-map" id="'.$this->attributes["id"].'"	';
            if($this->height && $this->height!="auto") $ret.=" data-height='".$this->height."' ";
            $ret.='    data-center="'. $this->center .'"';
            $ret.='    data-geolocate="'. $this->geolocate .'"';
            $ret.='    data-zoom="'. $this->zoom .'"';
            $ret.='    data-multiple="'. ($this->multiple?'true':'false') .'"';
            $ret.='    data-animation="'. ($this->getAttribute("animation",false)?'true':'false') .'"';
            $ret.='    data-cluster="'. ($this->getAttribute("cluster",false)?'true':'false') .'"';
            $ret.='    data-markers=\''. json_encode($this->markers) .'\'';


            if($controls=$this->getAttribute("controls")){
                $ret.='    data-controls=\''. json_encode($controls) .'\'';

            }
                // $ret.='    data-click-add="true"';


            $ret.='    ></div>';
            $ret.='    <small class="coords-display border p-2  bg-light text-muted text-right" ></small>';

            
            // $ret = new Input($attributes,$newdata);
        }
        $ret.='</div>';
		return $ret;//->render();
	}
	
	public function __construct($attributes=[], $data=[]){
        // dump($attributes);
        parent::__construct($attributes,$data);

        if(isset($attributes['icon'])){
			$this->inputicon = $attributes['icon'];
			$this->icon=null;
        }
        // dump($this);
        // dump($this->attributes);


		// if(isset($this->attributes['type']) &&  $this->attributes['type']=="number"){
		// 	$this->attributes["type"]="text";
		// 	$this->addClass("number");
		// }
		
		// if(isset($this->attributes["multiple"]) && $this->attributes["multiple"] && !ends_with($this->attributes['name'],"[]")) $this->attributes["name"].="[]";
		//dump($this->attributes);
		
	}
	
}