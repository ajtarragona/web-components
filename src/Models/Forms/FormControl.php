<?php

namespace Ajtarragona\WebComponents\Models\Forms;

use Illuminate\Support\Str;

class FormControl
{
	
	public $tag;
	public $closetag = false;

	public $container = true;
	
	public $containerclass = '';

	public $label = '';
	public $outlined = true;
	public $size = 'md';
	public $sidelabel = false;
	public $sidelabelwidth = false;
	// public $disabled = false;
	// public $readonly = false;
	public $required = false;
	public $helptext=false;
	public $attributes = [];
	public $icon=false;
	public $iconposition="left";
	public $append=false;
	public $prepend=false;
	
	public $data = [];

	protected $errors=null;

	public function __construct($attributes=[], $data=[]){
		//$this->attributes=$attributes;
		//$this->data=$data;
		
		$this->errors= isset($attributes["errors"])? $attributes["errors"] :  session()->get('errors');
		
		$this->prepareAttributes($attributes);
		$this->prepareData($data);
	}

	public function getAttribute($name,$default=null){
		return data_get($this->attributes,$name,$default);
	}

	public function setAttribute($name,$value){
		data_set($this->attributes,$name,$value);
	}

	
	public static function generateUid($prefix=false){
		$ret= ($prefix?$prefix."-":""). Str::uuid();
		return $ret;//uniqid($prefix?$prefix."-":false);
	}


	protected function prepareAttributes($attributes=[]){
		//dd(get_object_vars($this));
		//las keys deben estar en camelCase, 
		//los atributos en kebab-case 
		foreach(get_object_vars($this) as $key=>$value){
			$var=$key;
			$key=kebab_case($key);
			// dump($key);
			// dump(array_keys($attributes));
			if(in_array($key, array_keys($attributes))){
				$this->$var = $attributes[$key];
				unset($attributes[$key]);
			}
		}
		
		if(!isset($attributes['id'])){
			if(isset($attributes['name'])) $this->attributes['id']=  'input-'. str_replace('[]', '', $attributes['name']) ;
			else $this->attributes['id']=self::generateUid('input');
		}
		
		//la clase css la acumulo
		if(isset($attributes['class']) && isset($this->attributes['class']) ){
			if(is_array($attributes['class'])) $attributes['class']=implode(" ",$attributes['class']);
			$attributes['class']= $this->attributes['class']." ".	$attributes['class'];
		}

		$this->attributes=array_merge($this->attributes,$attributes);
	}
	

	protected function prepareData($data=[]){
		$this->data=array_merge($this->data,$data);
	}

    
    protected function renderAttributes($excluded=[]) {
    	return self::html_attributes($this->attributes,false,$excluded);
    }

    protected function renderData($excluded=[]) {
    	return self::html_attributes($this->data,"data",$excluded);
    }

    protected function isVisible(){
    	if(isset($this->attributes["visible"])){
    		return $this->attributes["visible"];
    	} 
    	return true;
    }


	public static function html_attributes($array=false, $prefix=false, $excluded=[]) {
		
		if(!$array) return;

		$ret="";

		
		foreach ($array as $k => $v)
		{	
			//los data los pongo todos, los attributes solo los que tengan valor 
			// dump($k);
			// dump($v);
			$hasValue= ($v || $v===0 || $v==="0");
			// dump($hasValue);
			// if(!in_array($k, $excluded) && ($prefix || $v  )){

			if(!in_array($k, $excluded) && ($prefix || $hasValue) ){
				

				$ret.=" ".($prefix?($prefix."-"):"").$k."=";

				if(is_array($v) || is_object($v)){

					$ret.="'".json_encode($v)."' ";
			    }else{
			    	$ret.="\"".htmlspecialchars($v)."\" ";
			    }
			}
		    //$array[$prefix.'-'.$k] = $v;
		    //unset($array[$k]);
		}
	
		
		return $ret;

	}

	


	

	
	public function addClass($name){
		$this->setAttribute('class',  	$this->getAttribute('class')." ".$name);
	}

	protected function containerClass(){
		
		$ret=["form-group", "", $this->containerclass];
		if($this->errors) {
			if($this->errors->has($this->getAttribute('name'))) $ret[]=' with-feedback is-invalid ';
		}

		if($this->outlined) $ret[]="outlined";
		if($this->sidelabel) $ret[]="sidelabel";
		if($this->getAttribute("disabled")) $ret[]="disabled";
		if($this->getAttribute("readonly")) $ret[]="readonly";
		if($this->size) $ret[]="form-group-".$this->size;
		if($this->required) $ret[]="required";
		return implode(" ",$ret);

	}


	protected function renderFormGroupStart($attributes=[],$data=[]){
		$ret="";
		$ret.="<div";
		$ret.="	class='" .$this->containerClass(). "' ";
		$ret.=html_attributes($attributes);
		$ret.=html_attributes($data);
		$ret.=">";

		
		return $ret;
	}
	
	protected function renderFormGroupEnd($attributes=[],$data=[]){
		$ret="";
		$ret.="</div><!--.form-group-->";
		return $ret;
	}


	public function renderIcon(){
		if($this->icon) {
			$ret='<div class="input-group-prepend '. ($this->iconposition=="right"?'order-12':'') .'">';
			$ret.="	<span class='input-icon '>". icon($this->icon). "</span>";
			$ret.="</div>";
			return $ret;
		}

	}

	public function renderLabel(){
		if(!empty($this->label)){
			return 	"<label for='".$this->attributes['id']."' ".($this->sidelabelwidth?"style='width:".$this->sidelabelwidth."' ":"")." class='col-form-label col-form-label-".$this->size."'>". $this->label."</label>";
		}
	}

	public function renderHelpText(){
		if($this->helptext){
			return "<small class='form-text text-muted'>".$this->helptext."</small>";
		}
	}


	public function renderErrors(){
		// if($this->getAttribute('name')=="comici.nom")  dd($this->getAttribute('name'), session()->get('errors'));
		if($this->errors){
			if($name=$this->getAttribute('name')){
				return "<div class='invalid-feedback'>". $this->errors->first($name) ."</div>";
			}
		}
	}

	public function render($args=[]){
    	if(!$this->isVisible()) return;

			$ret="";
			if($this->container){
				$ret.=$this->renderFormGroupStart();
			}
			

			if($this->sidelabel){
				$ret.="<div class='d-flex flex-row'>";
			}
			
			$ret.=$this->renderLabel();
			
			$ret.="<div class='input-group flex-nowrap ' >";
			
			$ret.=$this->renderIcon();
			
			if($this->prepend){
				$ret.='<div class="input-group-prepend">';
				$ret.='	<span class="input-group-text" >'.$this->prepend.'</span>';
				$ret.='</div>';
			}
			
			$ret.="<div class='flex-grow-1 form-control-container mw-100' >";
			
			if(method_exists($this,'preHook')){
				$ret.=$this->preHook();
			}
			
			if(method_exists($this,'bodyReplaceHook') && $this->bodyReplaceHook()){
				$ret.=$this->bodyReplaceHook();
			}else{

				
				// dump($this->attributes);
				//render the input
				$ret.="<{$this->tag} ";
				$ret.=$this->renderAttributes();
				$ret.=" ";
				$ret.=$this->renderData();
				$ret.=$this->closetag?">":"/>";
				
				// $this->renderBody();
				if(method_exists($this,'bodyHook')){
					$ret.=$this->bodyHook();
				}
				
				if($this->closetag) $ret.="</{$this->tag}>";

				
			}
			
			if(method_exists($this,'postHook')){
				$ret.=$this->postHook();
			}
			
			$ret.="</div><!--.form-control-container-->";
			
			if($this->append){
				$ret.='<div class="input-group-append">';
				$ret.='	<span class="input-group-text" >'.$this->append.'</span>';
				$ret.='</div>';
			}
			$ret.="</div><!--.input-group-->";
			

			if($this->sidelabel){
				$ret.="</div><!--.flex-row-->";
			}

			$ret.=$this->renderHelpText();
			$ret.=$this->renderErrors();
			
			
			if($this->container){
				$ret.=$this->renderFormGroupEnd();
			}
			
			return $ret;
    	
	}






	


}
