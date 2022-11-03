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
		$theme=config('webcomponents.login_theme');
     	return $this->view($theme ? "layout.auth.login-themable":"layout.auth.login");
	}

	public function username()
    {
        return 'username';
    }

}
