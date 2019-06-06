<?php
namespace Ajtarragona\WebComponents\Models\Forms;

class Checkbox extends FormControl
{	
	public $tag ="input";
    public $color;
    public $renderhelper=true;
    public $label=null;
    public $checklabel=null;
    public $container = false;
    public $horizontal=false;
    public $options=[];
    public $checked=false;
    
	public $attributes=[
		'name'=>'',
		'value'=>'',
		'type'=>'checkbox',
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

            $ret.="<div class='custom-control custom-checkbox {$this->color}'>";

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
                $id='checkbox_'. str_replace('[]', '', $this->getAttribute('name').'_'.kebab_case($key));
                    
                $ret.="<div class='".$this->getAttribute("class")."'>";
                $ret.="   <input type='checkbox' ";
                $ret.="        name=\"".$this->getAttribute('name')."\" "; 
                $ret.="        id=\"".$id."\""; 
                $ret.="        value=\"".$key."\""; 
                if($this->checked && is_array($this->checked) && in_array($key, $this->checked)) $ret.=" checked='true'";
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
            $defclass="custom-control custom-checkbox";
            
            if( !ends_with( $this->getAttribute('name') ,"[]") )  $this->setAttribute('name', $this->getAttribute('name')."[]");
		}else{
            $defclass="custom-control-input";

            if($this->label) $this->checklabel=$this->label;
            $this->label=null;
            
            if($this->checked) $this->setAttribute('checked',true);
            
            if(!$this->getAttribute('id')) $this->setAttribute('id' , 'checkbox_'.$this->getAttribute('name').'_'.kebab_case($this->getAttribute('value')));
		}
        $this->setAttribute( "class", ($defclass." ".$this->getAttribute("class")) ) ;
        // dump($this);
	}
	
}