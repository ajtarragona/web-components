<?php

namespace Ajtarragona\WebComponents\Models\Charts;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

use Ajtarragona\WebComponents\Models\DatasetValue;
use Ajtarragona\WebComponents\Traits\ChartWithColors;

class BaseChart
{   

    use ChartWithColors;
    

    public $id;
    public $chart_type;
    
    private $datasets;
    protected $options = [];
    public $container_class;
    public $css_class;
    public $preloader=true;
    protected $option_params=[];
    protected $color_mode = "dataset";
    protected $palette = "default";
    protected $auto_color = true;

    protected $plugin_options = ["legend","title","subtitle","tooltip","datalabels"];
    protected $fillable_attributes = ["id","chart_type","container_class","css_class",'preloader','palette','color_mode'];

  
 

    /**
     * Cuando creo la instancia
     * Comprueb si pasan alguna opcion atributable
     * Fusiono this->options de la instancia heredada con las opciones por defecto
     * Fusiono con las opciones que pasan por parametro
     */
    public function __construct($options=[])
    {   
        
        $this->datasets=collect();

        $this->palettes = config('webcomponents.charts.palettes',[]);
        foreach($this->fillable_attributes as $attribute_name){
            if(isset($options[$attribute_name])){
                $this->{$attribute_name}=$options[$attribute_name];
                unset($options[$attribute_name]);
            }
        }
        

        $this->options = array_merge([
            "responsive" => true,
            "maintainAspectRatio" => true,
            "aspectRatio" => 2
            
        ], $this->options);
        // dump($this->options, $this);
        $this->setOptions($options);

       

    }

   
    

    public function _id(){
        return $this->id ? $this->id :  uniqid('chart-');
    }

    private function prepareOptions(){
        foreach($this->options as $key=>$option){
            if(Str::contains($key,".")){
                data_set($this->options,$key,$option);
                unset($this->options[$key]);
            }
        }
        foreach($this->options as $key=>$option){
            if(in_array($key, $this->plugin_options)){
                if(!isset($this->options["plugins"])) $this->options["plugins"]=[];
                if(isset($this->options["plugins"][$key])) $this->options["plugins"][$key]=array_merge($this->options["plugins"][$key],$option);
                else $this->options["plugins"][$key]=$option;
                unset($this->options[$key]);
            }
        }
        
    }

    public function addDataset($label, $data, $options=[]){
        // dump($label, $data, $options);
        if($this->auto_color && $this->color_mode=="dataset"){
            $options=$this->addColorToOptions($options,$this->datasets->count());
        }

        $dataset=new Dataset($label,$data,$options);
        $this->datasets->push($dataset);  
        return $dataset;
    }

    public function setDatasets($datasets){
        return $this->datasets=$datasets;
    }
    public function getDatasets(){
        return $this->datasets;
    }

    public function getDataset($id){
        return $this->datasets->firstWhere("id",$id);
    }


    public function getPreparedData(){
        $ret=[];
        foreach($this->datasets as $dataset){
            $ret[]=$dataset->prepare();
        }
        return $ret;
    }


    public function addValueToDataset($id, $title, $value=null, $options=[]){
        // dd("addvalue",$this,$id, $titleordatavalue,$value, $options);
        foreach($this->datasets  as $i=>$dataset){
        // $this->datasets->map(function($dataset) use($id,$titleordatavalue, $value, $options){
            if($dataset->id == $id){
                if($this->auto_color && $this->color_mode=="element"){
                    // dump($options);
                    $options=$this->addColorToOptions($options,count($dataset->data));
                    // dump($options);
                }
                $dataset->addDataValue($title, $value, $options);
            }
        }
        // });
    }

    public function setOptions($options=[]){
        $this->option_params=array_merge($this->option_params,$options);
        $this->options =  array_merge($this->options, $options);
        $this->prepareOptions();
        return $this;
    }
    public function setOption($name, $value){
        data_set( $this->options , $name, $value);
        $this->prepareOptions();
        
        return $this;
    }
    public function getOptionParams(){
        return $this->option_params;
    }
    public function getOptions(){
        return $this->options;
    }
    public function getOption($name, $default=null){
        return data_get( $this->options , $name, $default);
    }

    

    public function render(){
        
        // dump($this->datasets);
        // dump($this);
        return view("ajtarragona-web-components::components.bootstrap.chart", ["chart"=>$this])->render();
    }
   
    
    public function isAsync(){
        return uses_trait($this, 'Ajtarragona\WebComponents\Traits\AsyncChart'); // && (!isset($this->async) || (isset($this->async) && $this->async)) );
    }

}