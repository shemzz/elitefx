<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests;

use App\settings;
use App\meta;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $api = new meta(); 
        //bugs
		$res = $api->verify_license();
			if($res['status']!=true){
			  die("
			  <h3>Oops! We are sorry to lock you out, But it seems you have an invalid license. Please contact <a href='mailto:support@brynamics.xyz'>support.</a>
			  </h3>
			  ");
			}
        include'get_ip_info.php';
        return view('auth.register')
        ->with(array(
            'user_country'=>$user_country,
            'countries'=>$countries,
            'title'=>'Register',
            'settings'=>settings::where('id','1')->first(),
        ));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
