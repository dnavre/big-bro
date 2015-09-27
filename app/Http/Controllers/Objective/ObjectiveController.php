<?php
/**
 * Created by PhpStorm.
 * User: Sahak.Ordukhanyan
 * Date: 9/27/2015
 * Time: 12:22 PM
 */

namespace BigBro\Http\Controllers\Objective;


use BigBro\Http\Controllers\Controller;
use BigBro\Http\Requests\Request;
use BigBro\Models\User;
use BigBro\Providers\ObjectiveServiceProvider;
use Illuminate\Support\Facades\App;

class ObjectiveController extends Controller
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


    public function objectives (Request $request) {
        $year = $request->get('year');
        $quarter = $request->get('quarter');
        $personId = $request->get('personId');

        $user = User::where(['id' => $personId])->first();
        $schedule = $this->scheduleService->getScheduleByEntity($user->entity->id, $year, $quarter);

        dd($schedule);
    }
}