<?php

namespace Ajtarragona\WebComponents\Controllers; 

use App\Http\Controllers\Controller;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use Illuminate\Http\Request;
use \Artisan;


class DocsController extends Controller
{

  protected function publishPackageAssets(){
      /*quitar en producció!!*/
      
      Artisan::call('vendor:publish', [
          '--tag' => 'ajtarragona-web-components-assets', 
          '--force' => 1
      ]);

      /**/
  }
	
  protected function packageView($view, $args=[]){
		return view("ajtarragona-web-components::".$view, $args);
  }

 
  public function docsHandle($page='start.introduction',Request $request)
  {
     $params=$request->all();
     //dd($params);
     //dd($request->uploaded_file);
     
     //session()->flash('params', $params);

     return redirect()->route('webcomponents.docs',[$page])->with(['info'=>$params]);
     
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

       
       return $this->packageView("docs",$args);
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

