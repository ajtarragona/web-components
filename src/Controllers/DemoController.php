<?php

namespace Ajtarragona\WebComponents\Controllers;

use Illuminate\Http\Request;
use Ajtarragona\WebComponents\Controllers\BaseController as Controller;
use Ajtarragona\WebComponents\Models\Demo\DemoHelper as Demo;
use Ajtarragona\WebComponents\Models\Demo\Item;
use Ajtarragona\WebComponents\Models\Demo\Type as ItemType;

use Ajtarragona\WebComponents\Models\Forms\Input;


class DemoController extends Controller
{



   public function demo()
   {

      $this->publishPackageAssets();

     
      if (Demo::isInstalled()) {

         return $this->view("demo");
      } else {
         return $this->view("demo.uninstalled");
      }
   }


   public function items()
   {
      $items = Item::all();
      return $this->view("demo.items.list", compact('items'));
   }
}
