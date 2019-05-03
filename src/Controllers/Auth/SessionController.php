<?php

namespace Ajtarragona\WebComponents\Controllers\Auth;

use Illuminate\Http\Request;
use Ajtarragona\WebComponents\Controllers\BaseController as Controller;
use Ajtarragona\WebComponents\Requests\AuthValidate;

class SessionController extends Controller
{

	public function __construct(){
		$this->middleware('guest', ['except'=>'destroy']);

	}

    public function index()
	{
		return $this->view("layout.auth.login");
	}

	public function start(AuthValidate $request)
	{
		//dd(request());
		//attempt authenticate the user

		if (!auth()->attempt($request->only(['username', 'password']))) {
			
			return back()->with(['error'=>__('tgn::auth.wrongcredentials')]);
		}
		//$url = redirect()->intended()->getTargetUrl();
		//dd($url);

		$ret= redirect()->intended();
		//dd($ret->getTargetUrl());
		return $ret;

	}

	public function destroy()
	{
		
		auth()->logout();
		
		return redirect()->back();
	}


}
