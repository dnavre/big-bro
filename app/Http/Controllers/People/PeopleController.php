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
use Illuminate\Http\Request;
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
        $people = $this->peopleService->listPeople();
        return view('people', [
            'mainMenu' => 'people',
            'people' => $people
        ]);
    }

    public function get($id) {
        $person = $this->peopleService->getPerson($id);
        return view('people.okr', [
            'person' => $person,
            'quarter' => $this->getQuarter()
        ]);
    }

    public function objectives (Request $request) {
        $year = $request->get('year');
        $quarter = $request->get('quarter');
        dd($year, $quarter);
    }

    private function getQuarter () {
        $month = date('n');
        if($month >= 1 && $month <= 3) {
            return 1;
        }  else if($month >= 4 && $month <= 6) {
            return 2;
        } else if($month >= 7 && $month <= 9) {
            return 3;
        } else {
            return 4;
        }
    }
}