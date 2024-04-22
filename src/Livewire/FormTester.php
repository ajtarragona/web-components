<?php

namespace Ajtarragona\WebComponents\Livewire;
 
use Livewire\Component;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;

class FormTester extends Component
{
    public $view;
    public $value;
    public $value_multi=[1,2];
    public $options;
    public $data;
    public $data_multi=[];

    private function getTestOptions($num=10, $combo=false, $dividers=false, $html=false){
        $faker = FakerFactory::create();
        $ret = [];
        for($i=1;$i<=$num;$i++){
            if($combo){
              $name=$faker->name;
              if($html){
                $suggestion= icon('star') . " <strong>"."Opció ".$i."</strong> - ".$name;
                $name="Opció $i - ".$name;
                $ret[] = ["value"=>$i, "name" =>$name, "suggestion"=>$suggestion];
              }else{
                $ret[] = ["value"=>$i, "name" =>"Opció $i - ".$name];
  
              }
  
              
              if($dividers){
                if(mt_rand(0,100)>90) $ret[]=["divider"=>true];
              }
            }else{
              $ret[$i] = "Opció $i";
              if($dividers){
                if(mt_rand(0,100)>90) $ret[null]=null;
              }
            }
            
        }
        return $ret;
    }


    public function mount($view=null)
    {
      // dd($view);
        $this->options=$this->getTestOptions();
        $this->view=$view?$view:"selects";

    }


    public function updated(){
       
    }

    public function render()
    {
        return view('ajtarragona-web-components::docs.wire.'.$this->view);
    }
}