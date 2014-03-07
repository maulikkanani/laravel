<?php

class HomeController extends BaseController {

    protected $layout = "layouts.main";

    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function showWelcome() {
        return View::make('hello');
    }

    public function showLogin() {
        // show the form
        $this->layout->content = View::make('user.login');
    }

    public function doLogin() {
        // validate the info, create rules for the inputs
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                            ->withErrors($validator) // send back all errors to the login form
                            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                Session::flash('message', 'Login Successfully.');
                return Redirect::to('sticky');
            } else {
                // validation not successful, send back to form	
                Session::flash('message', 'User Authentication Fails.');
                 $this->layout->content =View::make('user.login');
            }
        }
    }

    public function doLogout() {
        Auth::logout(); // log the user out of our application
        return Redirect::to('login'); // redirect the user to the login screen
    }

    public function showRegister() {
        $this->layout->content = View::make('user.register');
    }

    public function doRegister() {
        
        $rules = array(
            'username' => 'unique:users',
            'firstname' => 'required|alpha|min:2',
            'lastname' => 'required|alpha|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_num|between:6,12|confirmed',
            'password_confirmation' => 'required|alpha_num|between:6,12'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $user = new User;
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            return Redirect::to('login')->with('message', 'Thanks for registering!');
        } else {
            Session::flash('message', 'Please fill correct formate'); 
            return Redirect::to('register')
                            ->withErrors($validator) // send back all errors to the login form
                            ->withInput(Input::except('password'));
        }
    }

}