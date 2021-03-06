<?php

namespace BigBro\Http\Controllers\Overview;

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

class OverviewController extends Controller
{

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
    }

    public function show() {
        return view('overview', ['mainMenu' => 'overview']);
    }
}
