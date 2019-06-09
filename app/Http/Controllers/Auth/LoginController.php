<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function guard()
    {
      return \Auth::guard('professeur');
    }

    public function username()
    {
        return 'pseudo';
    }

    public function showLoginForm()
    {
        return view('auth.coustum-login');
    }

    public function login(Request $request){
        if(auth()->guard('professeur')->attempt(['pseudo' => $request->pseudo,'password'=>$request->password]))
        {
          return redirect($this->redirectTo());
        }

        return back()->withErrors(['pseudo'=>'combinaison pseudo mot de passe incorrecte.']);

    }

    protected function redirectTo(){
      if(auth()->check()){
           $role = auth()->user()->user_role;
        }

      return empty($role) ? route($role.'.index') : '/home';
    }
    
}
