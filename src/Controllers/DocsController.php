<?php

namespace Ajtarragona\WebComponents\Controllers; 

use App\Http\Controllers\Controller;
use Faker\Generator as Faker;
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


    public function docs($page='start.introduction',Faker $faker){ 
       $this->publishPackageAssets();
       $args=compact('faker','page');

       if($page=='forms.select'){

	       	$args['selectoptions'] = [];
	       	for($i=1;$i<=10;$i++){
	       		$args['selectoptions'][$i] = "Opció $i";
	       	}
       }

       
       return $this->packageView("docs",$args);
  }


}

