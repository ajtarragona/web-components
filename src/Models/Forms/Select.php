<?php
namespace Ajtarragona\WebComponents\Models\Forms;

class Select extends FormControl
{	
    public $tag ="select";
    public $closetag=true;

    public $options=[];
    public $selected=[];
    public $showDeselector=true;
    public $liveSearch=false;
    public $actionsBox=false;
    public $width='100%';
    public $length='auto';
    public $url=false;
    public $type='default';
    public $renderhelper=false;
    
        

	public $attributes=[
		'name'=>'',
		'type'=>'text',
		'title'=>'',
		'placeholder'=>'--',
		'id'=>'',
        'class'=>'form-control',
        'multiple'=>false,
        'type' =>'default',
        'selected'=>false
	];
    
	// public $data = [
    //     'url' => false,
    //     'show-deselector' => true,
    //     'live-search' => false,
    //     'width' => '100%',
    //     'actions-box' => false,
    //     'style'=>'default'
    // ];


    public function preHook(){
		if($this->renderhelper) return "<input type='hidden' name='".$this->getAttribute("name")."' value='' />";
    }

    
    protected function renderOptions($options){
        $ret="";
        if($options){
            foreach($options as $key=>$value){
                if(is_array($value) && $value){
                    $ret.="<optgroup label='{$key}'>";
                    $ret.=$this->renderOptions($value);
                    $ret.="</optgroup>";
                }else{
                    if(is_null($value)){
                        $ret.='<option data-divider="true"></option>';
                    }else{
                        $value=str_replace("\"","\\\"",$value);
                        $ret.="<option value=\"{$key}\"  data-content=\"{$value}\" ".(in_array($key,$this->selected)?'selected':'').">{$value}</option>";
                    }
                }
            }
        }
        return $ret;
    }


    public function bodyHook(){
        $ret="";
        
        if($this->options){
            $ret.=$this->renderOptions($this->options);
        }
        return $ret;
	}


    protected function containerClass(){
        $ret=parent::containerClass();
        if($this->type && $this->type!='default') $ret.= " bg-".$this->type;
        return $ret;
    }
    
    
	public function __construct( $attributes=[], $data=[] ){
		parent::__construct($attributes,$data);
        // dd($attributes,$this->attributes, $this->getAttribute("length"), $this->length);
        if( $this->getAttribute("multiple") && !ends_with( $this->getAttribute('name'),"[]" ) ) $this->setAttribute("name", $this->getAttribute('name')."[]");
        
        if( $this->getAttribute("placeholder") ) $this->setAttribute('title',$this->getAttribute("placeholder"));
		$this->data["show-deselector"] = $this->showDeselector;
		$this->data["live-search"] = $this->liveSearch;
		$this->data["actions-box"] = $this->actionsBox;
        $this->data["width"] = $this->width;
        $this->data["style"] = 'btn-'.$this->type;
        // $this->data["style"] = 'btn-'.$this->type;

		// $this->data["style"] = 'btn-'.$this->getAttribute("type");
		$this->data["size"] = $this->length;

		if($this->url){
			$this->data["url"]=$this->url;
			$this->data["value"]=$this->selected;
		}
		// dump($this->data);

		if(ends_with($this->getAttribute('id'), "[]" )) $this->setAttribute('id', str_replace("[]", "", $this->getAttribute('id')) );
		if(!is_array($this->selected)) $this->selected = [$this->selected];
		// dump($this);
    }
    


	
}