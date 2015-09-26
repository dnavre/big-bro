<?php
/**
 * Created by PhpStorm.
 * User: Sahak.Ordukhanyan
 * Date: 9/27/2015
 * Time: 3:18 AM
 */

namespace BigBro\Http\Controllers\People;

use BigBro\Http\Controllers\Controller;
use BigBro\Providers\PeopleServiceProvider;
use Illuminate\Support\Facades\App;

class PeopleController extends Controller
{

    /**
     * @var PeopleServiceProvider
     */
    private $peopleService;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->peopleService = App::make('BigBro\Providers\PeopleServiceProvider');
    }

    public function listAll() {
        return view('people', ['mainMenu' => 'people']);
    }
}