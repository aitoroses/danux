<?php

class User_Controller extends Base_Controller {

	public $restful = true;

    public function post_account(){

        $user = Session::get('username');
        $pass = Session::get('password');

        if(isset($user)){
            $usr = new User;
            $usr->username = $user;
            $usr->password = $pass;
            $usr->save();
            $usr->roles()->delete();
            $usr->roles()->attach(3);

            // Now we login

            $credentials = array('username' => $user, 'password' => $pass);

            if ( Auth::attempt($credentials) ){
                    // we are now logged in, go to home
                    return Redirect::to('/1#config');

            }else{
                    // auth failure! lets go back to the login
                    return Redirect::to('/')
                        ->with('log_error', true);
                    // pass any error notification you want
                    // i like to do it this way  
            }
        }

        return Redirect::to('/coupon');
    }

	public function get_register()
    {
        $user = Input::get('username');
        $pass = Input::get('password');

        $validation = User::validate(Input::all());

        if($validation->fails()) {
            return Redirect::to('/')
                ->with_errors($validation->errors);
       }

        Session::put('username', $user);
        Session::put('password', $pass);

        return Redirect::to('coupon');  
    }    

	public function post_login()
    {

        $user = Input::get('username');
        $pass = Input::get('password');

        $credentials = array('username' => $user, 'password' => $pass);

        if ( Auth::attempt($credentials) ){
                // we are now logged in, go to home
                return Redirect::to('/1#config');

        }else{
                // auth failure! lets go back to the login
                return Redirect::to('/')
                    ->with('log_error', true);
                // pass any error notification you want
                // i like to do it this way  
        }
    }    

	public function get_logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/')
                    ->with('log_out', true);
    }    

	public function get_check()
    {
        if(Auth::check()){
            return Response::eloquent(Auth::user());
        } else return "No has iniciado sesion";
    }
}