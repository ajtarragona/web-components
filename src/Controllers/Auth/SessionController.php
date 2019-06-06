<?php

namespace Ajtarragona\WebComponents\Controllers\Auth;

// use Illuminate\Http\Request;
// use Ajtarragona\WebComponents\Requests\AuthValidate;
use Ajtarragona\WebComponents\Controllers\BaseController as Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SessionController extends Controller
{
	use AuthenticatesUsers;

	protected $redirectTo = '/';

	public function __construct()
    {
        $this->middleware('guest')->except('logout');
	}

	public function showLoginForm()
    {
     	return $this->view("layout.auth.login");
	}

	public function username()
    {
        return 'username';
    }

}
