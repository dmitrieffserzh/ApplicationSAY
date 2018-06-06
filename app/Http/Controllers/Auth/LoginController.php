<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {
        return view('main.components.auth.login');
    }

	// AJAX AUTH
	protected function ajax_login( Request $request ) {
		$auth        = false;
		$credentials = $request->only( 'email', 'password' );
		if ( Auth::attempt( $credentials, $request->has( 'remember' ) ) ) {
			$auth = true; // Success
		}
		if ( $request->isMethod( 'post' ) && $request->ajax() ) {
			$returnHTML = view( 'main.components.auth.ajax-login' )->render();
			return response()->json( array( 'success' => true, 'auth' => $auth, 'html' => $returnHTML ) );
		} else {
			return redirect()->intended( URL::previous() );
		}
	}

}
