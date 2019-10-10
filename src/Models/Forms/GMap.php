<?php
namespace Ajtarragona\WebComponents\Models\Forms;

class GMap extends FormControl
{	
	public $tag ="div";

    
    public $height=false;  
    public $width=false;   
    // public $size="500x300"; //for readonly, pixel dimensions
    public $markers=[];
    public $zoom=14;
    public $geolocate=true;
    public $cluster=false;
    public $maptype="roadmap";
    public $format="PNG";
    public $addmarkerbtn= true;
    public $animation= false;
    public $center= false;
    public $controls= [];
    public $search= true;
    public $multiple= false;

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
                if(is_object($marker)) $marker=to_array($marker);

                $center= $marker["location"]["lat"].",".$marker["location"]["lng"];
                $markers[]=$center;
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
        
        if($this->getAttribute("readonly",false) || $this->getAttribute("disabled",false) ){
            
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
			
			$ret.="<div class='flex-grow-1 form-control-container mw-100' >";
			
			
            $ret.='<div class="map-container '.$this->getAttribute("mapcontainerclass").'">';

            if($this->search || $this->addmarkerbtn ){
                $ret.="<div class='input-group map-search-input'>";
                
                if($this->search){

                    $inputattrs=array_only($this->attributes, ["placeholder","class","inputicon","required","label","helptext","size"]);
                    $inputattrs["containerclass"]=$this->containerClass("containerclass","").' flex-grow-1';

                    $ret.=input($inputattrs, array_merge($this->data,[
                        'map' => "#".$this->getAttribute("id")
                    ]));
                        
                }
                    
                if($this->addmarkerbtn){
                    $txt=$this->getAttribute("addmarkerbtntext", (icon('plus')." ".__("tgn::strings.Marcador")) );

                    $ret.="<div class='input-group-append'>";
                    $ret.="<button type='button' class='btn btn-light btn-sm add-marker-btn border' data-map='#".$this->attributes["id"]."' >". $txt."</button>";
                    $ret.="</div>";

                }

                $ret.="</div>";
            } 
            
            $inputdata=[
                "value"=>true,
                "map"=>"#".$this->attributes["id"]
            ];

            $ret.='    <input type="hidden" '.self::html_attributes($inputdata,"data").' name="'.$this->attributes["name"].'" />';


            $ret.='   <div class="google-map" id="'.$this->attributes["id"].'"	';
            if($this->height) $ret.=" data-height='".$this->height."' ";
            $ret.='    data-center="'. $this->center .'"';
            $ret.='    data-geolocate="'. $this->geolocate .'"';
            $ret.='    data-zoom="'. $this->zoom .'"';
            $ret.='    data-multiple="'. ($this->multiple?'true':'false') .'"';
            $ret.='    data-animation="'. ($this->animation?'true':'false') .'"';
            $ret.='    data-map-type="'. $this->maptype .'"';
            $ret.='    data-cluster="'. ($this->cluster?'true':'false') .'"';
            $ret.='    data-markers=\''. json_encode($this->getMarkers()) .'\'';


            if($this->controls){
                $ret.='    data-controls=\''. json_encode($this->controls) .'\'';

            }
                // $ret.='    data-click-add="true"';


            $ret.='    ></div>';
            $ret.='    <small class="coords-display border p-2  bg-light text-muted text-right" ></small>';

            
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

        // $this->markers=$this->getAttribute("markers",[]);

        if(!$this->center) $this->center=config('webcomponents.gmaps.tgn_coords');
        // dd($this);
        // $this->zoom=$this->getAttribute("zoom",config('webcomponents.gmaps.default_zoom'));
		// $this->multiple=$this->getAttribute("multiple",false);
		// $this->geolocate=$this->getAttribute("geolocate",true);
        // dump($this);
        // dump($this->attributes);


		if(isset($this->attributes['value'])){
            $val=$this->attributes['value'];
            if(is_array($val) && is_assoc($val)) $val=[$val];
			$this->markers=$val;
		}
		
		// if(isset($this->attributes["multiple"]) && $this->attributes["multiple"] && !ends_with($this->attributes['name'],"[]")) $this->attributes["name"].="[]";
		//dump($this->attributes);
		
	}
	
}