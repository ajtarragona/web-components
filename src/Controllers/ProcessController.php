<?php

namespace Ajtarragona\WebComponents\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProcessController extends Controller
{
     
     public function run(Request $request){
		// dd($request->all());
		$processname=$request->process;

    	$process = new $processname($request->except(['process','_token']));
		$process->run();
    }

}
