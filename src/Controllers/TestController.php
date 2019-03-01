<?php

namespace Ajtarragona\WebComponents\Controllers; 

use App\Http\Controllers\Controller;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use \Artisan;


class TestController extends Controller
{

  protected function publishPackageAssets(){
      /*quitar en producció!!*/
      
      Artisan::call('vendor:publish', [
          '--tag' => 'ajtarragona-web-components-assets', 
          '--force' => 1
      ]);

      /**/
  }
	
	protected function packageView($view, $args){
		return view("ajtarragona-web-components::".$view, $args);
	}

	public function kitchen(Faker $faker){ 
		
       $params=session('params','');
       $this->publishPackageAssets();
       return $this->packageView("kitchen",compact('faker','params'));
	}



	public function kitchenModal(Request $request, Faker $faker)
    {
       

       return $this->packageView('kitchen.modals.basic', compact('faker'));
    }


    public function kitchenHandle(Request $request)
    {
       $params=$request->all();
       //dd($params);
       //dd($request->uploaded_file);
       
       session()->flash('params', $params);

       return redirect()->route('webcomponents.kitchen');
       
    }


    public function docs($page='start.introduction'){ 
      
       $this->publishPackageAssets();
       return $this->packageView("docs",compact('faker','page'));
  }


}

