<?php

namespace Ajtarragona\WebComponents\Controllers; 

use Ajtarragona\WebComponents\Controllers\BaseController as Controller;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use Illuminate\Http\Request;
use \Artisan;


class DocsController extends Controller
{

  

  public function docsModal(Request $request, Faker $faker)
  {
    
    $request=$request->except(['_token','_method']);
      return $this->view('docs.source.layout.modal', compact('faker','request'));
  }
 
  public function docsHandle($page='start.introduction',Request $request)
  {
   
    $params=$request->all();
     //dd($params);
     //dd($request->uploaded_file);
     
     //session()->flash('params', $params);

     return redirect()->route('webcomponents.docs',[$page])->with(['info'=>$params]);
     
  }

  public function docsShowRequest(Request $request)
  {   
      return $this->view('docs.source.layout.showrequest', ["request"=>$request->except(['_token','_method'])]);
       
  }

  private function getTestOptions($num=10, $combo=false){
      $faker = FakerFactory::create();
      $ret = [];
      for($i=1;$i<=$num;$i++){
          if($combo) $ret[] = ["value"=>$i, "name" =>"Opció $i - ".$faker->name];
          else $ret[$i] = "Opció $i";
      }
      return $ret;
  }


  public function docs($page='start.introduction',Faker $faker){ 
       $this->publishPackageAssets();
       $args=compact('faker','page');

       if($page=='forms.select'){
          $args['selectoptions']=$this->getTestOptions(10);
       }

       
       return $this->view("docs",$args);
  }


  public function mentionsCombo(Request $request){
    $options = collect($this->getTestOptions(50,true));
    $ret = collect();
    foreach($options as $o){
      $ret->add(["key"=>$o["name"],"value"=>$o["name"]]);
    }
   // dd($options);
    if($request->q){
      $term=strtolower($request->q);
      
      $ret=$ret->filter(function ($value, $key) use ($term){
        return str_contains(strtolower($value["key"]), $term);// || $value["value"]==intval($term);
      });


    }
    //var_dump($options->toArray());
    return array_values($ret->toArray());
  }


  public function testCombo(Request $request){

    $options = collect($this->getTestOptions(50,true));
   // dd($options);
    if($request->term){
      $term=strtolower($request->term);
      
      $options=$options->filter(function ($value, $key) use ($term){
        return str_contains(strtolower($value["name"]), $term);// || $value["value"]==intval($term);
      });


    }
    //var_dump($options->toArray());
    return array_values($options->toArray());

  }

}

