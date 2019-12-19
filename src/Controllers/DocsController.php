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
    // abort(500,"Error");
    // return "dsad sad sad sa";

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


  public function userscombo(Faker $faker){
      $num=10;
      $ret=[];
      for ($i = 0; $i < $num; $i++) {
        $word= $faker->name;
        $ret[]= ["value"=>'user-'.$i,"key"=>$word];
      }

      return $ret;

  }


  public function tagscombo(Faker $faker){
      $num=10;
      $ret=[];
      for ($i = 0; $i < $num; $i++) {
        $word=$faker->word;
        $ret[]= ["value"=>$word,"key"=>$word];
      }

      return $ret;

  }


  protected function rand_float($st_num=0,$end_num=1,$mul=1000000)
  {
    if ($st_num>$end_num) return false;
    return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
  }

  public function mapmarkers(Request $request){

    $nummarkers=rand(1,5);
    $markers=[];

    for($i=0;$i<$nummarkers;$i++){
      $lat=$this->rand_float($request->minlat, $request->maxlat);
      $lng=$this->rand_float($request->minlng, $request->maxlng);
      
      $markers[]=[
        "name"=>"Marker ".($i+1),
        "location" => ["lat"=>$lat,"lng"=>$lng],
        "infobox" =>"Marker ".($i+1),
      ];
    }

    
    return $markers;

  }

}

