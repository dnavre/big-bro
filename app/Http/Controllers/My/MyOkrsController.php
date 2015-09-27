<?php
/**
 * Created by PhpStorm.
 * User: Sahak.Ordukhanyan
 * Date: 9/27/2015
 * Time: 12:22 PM
 */

namespace BigBro\Http\Controllers\My;


use BigBro\Http\Controllers\Controller;
use BigBro\Models\User;
use BigBro\Providers\ObjectiveServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MyOkrsController extends Controller
{
    /*
     * @var ScheduleServiceProvider
     */
    private $scheduleService;

    /**
     * @var ObjectiveServiceProvider
     */
    private $objectiveService;


    public function __construct()
    {
        $this->scheduleService = App::make('BigBro\Providers\ScheduleServiceProvider');
        $this->objectiveService = App::make('BigBro\Providers\ObjectiveServiceProvider');
    }

    public function viewOkrs()
    {
        return view('my.okrs', ['mainMenu' => 'my', 'quarter' => 3, 'objectives' => []]);
    }
}