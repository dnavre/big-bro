<?php

namespace BigBro\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Log;
use Auth;
use Session;
use App;
use BigBro\Providers\AuthServiceProvider;
use BigBro\Models\User;
use Validator;
use BigBro\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    /**
     * @var AuthServiceProvider
     */
    private $authService;

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->authService = App::make('BigBro\Providers\AuthServiceProvider');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['username' => $request->input("username"), 'password' => $request->input("password")]))
        {
            $this->authService->createUserIfNeeded(Auth::user());

            return redirect()->intended('overview');
        } else {
            return view('welcome', ['invalidCredentials' => true]);
        }
    }


    /**
     * Handle a logout.
     *
     * @return Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect::to('welcome');
    }
}
