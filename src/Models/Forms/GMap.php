<?php
namespace Ajtarragona\WebComponents\Models\Forms;

use Illuminate\Support\Arr;

class GMap extends FormControl
{	
	public $tag ="div";
    
    public $outlined=true;
    
    public $height=false;  
    public $width=false;   
    // public $size="500x300"; //for readonly, pixel dimensions
    public $markers=[];
    public $zoom=14;
    public $geolocate=true;
    public $cluster=false;
    public $maptype="roadmap";
    public $format="PNG";
    public $fitbounds= false;
    public $showInfobox= false;
    public $addmarkerbtn= true;
    public $animation= false;
    public $center= false;
    public $controls= [];
    public $shapes= false;
    public $shapes_options= [];
    public $search= true;
    public $multiple= false;
    public $static= false;
    public $isreadonly= false;
    public $url= false;
    public $custommarkers= false;
    public $markeroptions= null;
    public $method= 'get';
    public $theme= false;
    public $showcoords = true;

	public $attributes=[
	];

	protected function getMarkers(){
        if(is_assoc($this->markers)) return [$this->markers];
        if(is_object($this->markers)) return [to_array($this->markers)];
        else return $this->markers;
    }

	protected function miniMap(){
        
        // dump($this);
        $size= (($this->width&&is_int(intval($this->width)))?$this->width:"300")."x".(($this->height&&is_int(intval($this->height)))?$this->height:"180");

        $options= [
            // "zoom"=>$this->zoom, 
            "size"=> $size,
            "maptype"=> $this->maptype,
            "format"=> $this->format
        ];

        $apikey=config('webcomponents.gmaps.api_key');

        // dd($this->center);
        $url="https://maps.googleapis.com/maps/api/staticmap?".http_build_query($options)."&key=".$apikey;
        
        if($this->getMarkers()){
            $markers=[];
            $center=0;
            foreach($this->getMarkers() as $marker){
                $marker=to_array($marker);
                switch($marker["type"]??"marker"){
                    case "marker":
                        $center= $marker["location"]["lat"].",".$marker["location"]["lng"];
                        $markers[]=$center;
                        break;
                    default:break;
                    
                }
            }
            $url.="&markers=".implode("|",$markers);
        }else{
            $url.="&zoom=".$this->zoom."&center=".$this->center;
        }

            
        return "<img src=\"".$url."\" class='".$this->getAttribute("class")."'/>";
    }

    public function render($args=[]){
    	if(!$this->isVisible()) return;        
        
		$ret="";
       
        if($this->static){
            
            $ret.='<div class="map-container '.$this->getAttribute("mapcontainerclass").'">';
            $ret.=$this->miniMap();
            $ret.="</div>";
        }else{
            
			if($this->container){
				$ret.=$this->renderFormGroupStart();
			}
			
            
			if($this->sidelabel){
				$ret.="<div class='d-flex flex-row'>";
			}
			
			$ret.=$this->renderLabel();
			
			$ret.="<div class='input-group' >";
			
			$ret.="<div class='flex-grow-1 form-control-container mw-100 ' >";
			
			
            $ret.='<div class="map-container '.$this->getAttribute("mapcontainerclass").'">';
// $ret.="[".$this->isreadonly ."-". $this->search ."-". $this->addmarkerbtn."]";

            if(!$this->isreadonly && ($this->search )){
            // if(!$this->isreadonly && ($this->search || $this->addmarkerbtn )){
                $ret.="<div class='input-group map-search-input ".($this->search?'with-search':'')."'>";
                
                $inputattrs=Arr::only($this->attributes, ["placeholder","class","color","inputicon","required","label","helptext","size"]);
                if(!isset($inputattrs["placeholder"])) $inputattrs["placeholder"] = __("tgn::strings.Introdueix una ubicació a buscar...");
                $inputattrs["containerclass"]=$this->containerClass("containerclass","").' flex-grow-1';
                $inputattrs["icon"]=$inputattrs["inputicon"] ?? null;

                
                if($this->search){

                    if(isset($inputattrs["color"])) $inputattrs["containerclass"].=" bg-".$inputattrs["color"];
                    // $ret.=json_encode($inputattrs);
                    $ret.=input($inputattrs, array_merge($this->data,[
                        'map' => "#".$this->getAttribute("id")
                    ]));
                    
                        
                }
                    
                // if($this->addmarkerbtn){
                //     $txt=$this->getAttribute("addmarkerbtntext", (icon('plus')." ".__("tgn::strings.Marcador")) );

                //     $ret.="<div class='input-group-append'>";
                //     $ret.="<button type='button' class='btn btn-". (isset($inputattrs["color"])?$inputattrs["color"]:'light') ." btn-sm add-marker-btn border' data-map='#".$this->attributes["id"]."' >". $txt."</button>";
                //     $ret.="</div>";

                // }

                $ret.="</div>";
            } 
            
            
            $inputdata=[
                "value"=>true,
                "map"=>"#".$this->attributes["id"]
            ];

            $ret.='    <input type="hidden" value=\''.json_encode($this->getMarkers()).'\' '.self::html_attributes($inputdata,"data").' name="'.$this->getAttribute("name").'" />';
            

            $ret.='   <div class="google-map" id="'.$this->attributes["id"].'"	';
            if($this->height) $ret.=" data-height='".$this->height."' ";
            $ret.='    data-search="'. ($this->search?'true':'false') .'"';
            $ret.='    data-addmarkerbtn="'. ($this->addmarkerbtn?'true':'false') .'"';
            $ret.='    data-center="'. $this->center .'"';
            $ret.='    data-geolocate="'. $this->geolocate .'"';
            $ret.='    data-zoom="'. $this->zoom .'"';
            $ret.='    data-multiple="'. ($this->multiple?'true':'false') .'"';
            $ret.='    data-animation="'. ($this->animation?'true':'false') .'"';
            $ret.='    data-custommarkers="'. ($this->custommarkers?'true':'false') .'"';
            $ret.='    data-map-type="'. $this->maptype .'"';
            $ret.='    data-cluster="'. ($this->cluster?'true':'false') .'"';
            $ret.='    data-fitbounds="'. ($this->fitbounds?'true':'false') .'"';
            $ret.='    data-show-infobox="'. ($this->showInfobox?'true':'false') .'"';
            $ret.='    data-url="'. ($this->url?$this->url:'') .'"';
            $ret.='    data-method="'. ($this->method?$this->method:'') .'"';
            $ret.='    data-readonly="'. ($this->isreadonly?'true':'false') .'"';
            $ret.='    data-markers=\''. json_encode($this->getMarkers()) .'\'';
            $ret.='    data-theme=\''. json_encode($this->theme) .'\'';


            if($this->controls){
                $ret.='    data-controls=\''. json_encode($this->controls) .'\'';

            }
            if($this->addmarkerbtn){
                if(!$this->shapes) $this->shapes=[];
                $this->shapes[]="marker";
            }
            
            if($this->shapes ){
                $this->shapes=array_unique($this->shapes);
                // dd($this->shapes);
                $ret.='    data-shapes=\''. json_encode($this->shapes) .'\'';

            }
            if($this->shapes_options ){
                // dd($this->shapes);
                $ret.='    data-shapes-options=\''. json_encode($this->shapes_options) .'\'';

            }
            if($this->markeroptions ){
                // dd($this->shapes);
                $ret.='    data-markeroptions=\''. json_encode($this->markeroptions) .'\'';
            

            }
                // $ret.='    data-click-add="true"';


            $ret.='    ></div>';
            if($this->showcoords){
                $ret.='    
                <div class="coords-container bg-light border" >
                    <div id="collapse-map-coords-'.$this->attributes["id"].'" class="collapse ">
                        <small class="coords-display text-muted" ></small>
                    </div>
                    <button type="button" class="btn btn-xs btn-light border-0" data-toggle="collapse" href="#collapse-map-coords-'.$this->attributes["id"].'" role="button" >'.icon('code').'</button>
                </div>';
            }
            
            // $ret = new Input($attributes,$newdata);
            $ret.='</div>';

            $ret.="</div><!--.form-control-container-->";
			
			$ret.="</div><!--.input-group-->";
			

			if($this->sidelabel){
				$ret.="</div><!--.flex-row-->";
			}

			$ret.=$this->renderHelpText();
			$ret.=$this->renderErrors();
			
			
			if($this->container){
				$ret.=$this->renderFormGroupEnd();
			}
        }
		return $ret;//->render();
	}
	
	public function __construct($attributes=[], $data=[]){
        // dump($attributes);
        parent::__construct($attributes,$data);


        /*quiito el icono del control y se lo pongo al input del buscador*/
        if($this->icon){
			$this->attributes['inputicon'] = $this->icon;
			$this->icon = false;
        }

        
        // dd($this->markers);
        // $this->markers=$this->getAttribute("markers",[]);

        if(!$this->center) $this->center=config('webcomponents.gmaps.tgn_coords');
        // dd($this);
        // $this->zoom=$this->getAttribute("zoom",config('webcomponents.gmaps.default_zoom'));
		// $this->multiple=$this->getAttribute("multiple",false);
		// $this->geolocate=$this->getAttribute("geolocate",true);
        // dump($this);
        // dump($this->attributes);
        
        if($this->getAttribute("readonly",false) || $this->getAttribute("disabled",false) ){
            $this->attributes["readonly"]=false;
            $this->attributes["disabled"]=false;
            $this->isreadonly=true;
        }
                

		if(isset($this->attributes['value'])){
            $val=$this->attributes['value'];
            if(is_array($val) && is_assoc($val)) $val=[$val];
			$this->markers=$val;
        }
        
        if($this->markers){
            // dump($this->markers);
            foreach($this->markers as $i=>$marker){
                $marker=to_array($marker);
                if(isset($marker["name"])) $this->markers[$i]["name"]=str_replace("'","&apos;",$this->markers[$i]["name"]);
                if(isset($marker["infobox"])) $this->markers[$i]["infobox"]=str_replace("'","&apos;",$this->markers[$i]["infobox"]);
            }
            // dd($this->markers);
        }
		
		// if(isset($this->attributes["multiple"]) && $this->attributes["multiple"] && !ends_with($this->attributes['name'],"[]")) $this->attributes["name"].="[]";
		//dump($this->attributes);
		
	}
	
}