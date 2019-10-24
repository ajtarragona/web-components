<?php
namespace Ajtarragona\WebComponents\Models\Forms;

class Radio extends FormControl
{
	public $tag ="input";
    public $color;
    public $renderhelper=false;
    public $label=null;
    public $checklabel=null;
    public $container = false;
    public $horizontal=false;
    public $options=[];
    public $checked=false;
    public $switch=false;
    
	public $attributes=[
		'name'=>'',
		'value'=>'',
		'type'=>'radio',
		'title'=>'',
		'placeholder'=>'',
		'id'=>'',
		'class'=>'',
	];

    public function preHook(){
        $ret="";
        if($this->sidelabel){
            $ret.="<div class='form-control-container pt-2'>";
        }

        if($this->options){
            
            $ret.="<div class='checkbox-group p-3 ". ($this->horizontal?'input-group':'') . "' id='".$this->getAttribute("id")."' >";
        }else{

            $ret.="<div class='custom-control ".($this->switch?"custom-switch":"custom-radio")." ". $this->color. "'>";

            if($this->renderhelper) $ret.="<input type='hidden' name='".$this->getAttribute("name")."' value='' />";
        }
        return $ret;
    }

	public function postHook(){
        $ret="";
        
        if($this->options){
            $ret.="</div>";//checkbox-group
        }else{
            $ret.="<label for='".$this->getAttribute("id")."' class='custom-control-label'>". (($this->checklabel && !$this->sidelabel)?$this->checklabel:'') ."</label>";
            $ret.="</div>";//custom-control
        }
        if($this->sidelabel){
            $ret.="</div>";
        }
        return $ret;
	}
    

    public function bodyReplaceHook(){
        if($this->options){
            $ret="";
            foreach($this->options as $key=>$option){
                $id='radio_'. str_replace('[]', '', $this->getAttribute('name').'_'.kebab_case($key));
                    
                $ret.="<div class='".$this->getAttribute("class")." ". $this->color ."'>";
                $ret.="   <input type='radio' ";
                $ret.="        name=\"".$this->getAttribute('name')."\" "; 
                $ret.="        id=\"".$id."\""; 
                $ret.="        value=\"".$key."\""; 
                if($this->checked && $key==$this->checked) $ret.=" checked='true'";
                if($this->getAttribute("disabled")) $ret.=" disabled='true'"; 
                if($this->getAttribute("readonly")) $ret.=" readonly='true'"; 
                        
                $ret.="        class='custom-control-input '"; 
                $ret.="    />";
    
                    
                $ret.="     <label for=\"". $id ."\" class=\"custom-control-label  \">". $option ."</label>";
    
                $ret.=" </div>";
            }
            // dump($ret);
            return $ret;
        }else{
            return false;
        }
    }
     
	public function __construct($attributes=[], $data=[]){
		parent::__construct($attributes,$data);

 		

		if($this->options){
            $defclass="custom-control " . ($this->switch?"custom-switch":"custom-radio");
            
            //if( !ends_with( $this->getAttribute('name') ,"[]") )  $this->setAttribute('name', $this->getAttribute('name')."[]");
		}else{
            $defclass="custom-control-input";

            if($this->label) $this->checklabel=$this->label;
            $this->label=null;
            
            if($this->checked) $this->setAttribute('checked',true);
            
            $this->setAttribute('id' , 'radio_'.$this->getAttribute('name').'_'.kebab_case($this->getAttribute('value')));
		}
        $this->setAttribute( "class", ($defclass." ".$this->getAttribute("class")) ) ;
        // dump($this);
	}


// 	protected $defaultattributes=[
// 		'name'=>'unnamed',
// 		'value'=>1,
// 		'checked'=>false,
// 		'title'=>'',
// 		'placeholder'=>'',
// 		'id'=>'',
// 		'class'=>'custom-control custom-radio',
// 		'container'=>false,
// 		'containerclass'=>'',
// 		'label'=>false,
// 		'sidelabel'=>false,
// 		'disabled'=>false,
// 		'readonly'=>false,
// 		'required'=>false,
// 		'outlined'=>true,
// 		'size'=>'md'
		
// 	];


// 	protected $hiddenattributes = ["containerclass",'container','label','sidelabel','renderhelper','outlined','size'];
	
// 	protected $view = 'forms.radio';


// 	public function __construct($attributes=[],$data=[]){
// 		parent::__construct($attributes,$data);

// 		if(isset($this->attributes['color'])) $this->attributes['class'].=" ".$this->attributes['color'];

// 		if(isset($this->attributes["options"])){
// 			$this->view='forms.radios';
// 			if(!$this->attributes['id']) $this->attributes['id']='radios_'.$this->attributes['name'];//.'_'.kebab_case($args['value']);
// 			if(!ends_with($this->attributes['name'],"[]")) $this->attributes['name'].="[]";
// 		}else{
// 			if(!$this->attributes['id']) $this->attributes['id']='radio_'.$this->attributes['name'].'_'.kebab_case($this->attributes['value']);
// 		}
		
// 	}


	
}