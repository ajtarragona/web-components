<?php

namespace Ajtarragona\WebComponents\Controllers; 

use Ajtarragona\WebComponents\Controllers\BaseController as Controller;
use Ajtarragona\WebComponents\Models\Charts\Examples\LinesAsyncChart;
use Ajtarragona\WebComponents\Models\Charts\Examples\PieAsyncChart;
use Ajtarragona\WebComponents\Models\Charts\Examples\DemoChart;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use Illuminate\Http\Request;
use \Artisan;
use SVG\SVG;


class DocsController extends Controller
{

  

  public function docsModal(Request $request, Faker $faker)
  {
    
    $request=$request->except(['_token','_method']);
    $args=compact('faker','request');
    $args['selectoptions']=$this->getTestOptions(10);
    return $this->view('docs.source.layout.modal', $args);
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


  public function docs($page='start.introduction',Faker $faker){ 
       $this->publishPackageAssets();
       $args=compact('faker','page');
       if($page=='forms.select'){
         $args['selectoptions']=$this->getTestOptions(10);
        }else if($page=='components.charts'){
          $args['demochart'] = new DemoChart();
          $args['linesasyncchart'] = new LinesAsyncChart();
          $args['pieasyncchart'] = new PieAsyncChart();

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


  public function testComboGroups(Request $request){
      return [
        "Group 1" => $this->getTestOptions(5,true),
        "Group 2" => $this->getTestOptions(2,true),
        "Group 3" => $this->getTestOptions(15,true,true),

      ];
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

  public function testComboHtml(Request $request){
    // abort(500,"Error");
    // return "dsad sad sad sa";

    $options = collect($this->getTestOptions(50,true, false,true));
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
    // dump($request->ids);
    for($i=0;$i<$nummarkers;$i++){
      $lat=$this->rand_float($request->minlat, $request->maxlat);
      $lng=$this->rand_float($request->minlng, $request->maxlng);
      
      $id=_uuid();

      $markers[]=[
        "id"=> $id,
        "name"=>"Marker ".($i+1),
        "location" => ["lat"=>$lat,"lng"=>$lng],
        "url" => route('webcomponents.markerinfobox',['id'=>$id]),
        // "infobox" =>"Marker ".($i+1),
        "icon" => 'plus',
        "color" => '#ff0000',
        // "image" => '#ffff00',
      ];
    }

    
    return $markers;

  }
  
  public function markerInfobox($id, Request $request){
    // return $request->all();
    $ret= input(
      [
        'type'=>'number', 
        'name'=>'campo_numerico', 
        'label'=>'Number', 
        'placeholder'=>'Enter num...'
      ]
    ) ;
    return $ret;
  }

  public function markerImage(Request $request){
    $options=[
      "backgroundcolor" => "#bf002c",
      "color" => "#ffffff",
      "bordercolor" => "#000000",
      "borderwidth" => "10px"
    ];

    $options=array_merge($options, $request->all());
  // dd($options);

    $svg='<svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">';
    $svg.='<path d="M 425.736 185.636 C 425.736 282.694 250.15 490.101 250 490.101 C 249.849 490.101 74.263 282.694 74.263 185.636 C 74.263 88.578 152.942 9.899 250 9.899 C 347.058 9.899 425.736 88.578 425.736 185.636 Z" style="stroke: '.$options["bordercolor"].'; fill: '.$options["backgroundcolor"].'; stroke-width: '.$options["borderwidth"].';"/>';
    $svg.='</svg>';

    // $svg  = '<svg x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" fill="'.$options["bgcolor"].'" xml:space="preserve">';
    // $svg .= '<g><path d="M500,10c-196.7,0-356.1,159.3-356.1,355.9c0,57.3,13.5,111.2,37.6,159.2c14.4,28.6,32.7,55.4,53.9,79L500,990l264.6-386c21.2-23.5,39.6-50.4,53.9-79c24.1-48,37.6-101.8,37.6-159.2C856.1,169.3,696.7,10,500,10L500,10z"/><path d="M690.6,357.8c0,105.1-85.5,190.3-190.7,190.3c-105.2,0-190.5-85.2-190.5-190.3c0-105.1,85.3-190.4,190.5-190.4C605.1,167.4,690.6,252.6,690.6,357.8z"/></g>';
    // $svg .= '</svg>';

    $image = SVG::fromString($svg);
    $doc = $image->getDocument();

    // $rect = $doc->getChild(0);
    // $rect->setX(25)->setY(25);

    header('Content-Type: image/svg+xml');
    echo $image;
    die();
  }

}

