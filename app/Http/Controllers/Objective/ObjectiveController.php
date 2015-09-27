<?php
/**
 * Created by PhpStorm.
 * User: Sahak.Ordukhanyan
 * Date: 9/27/2015
 * Time: 12:22 PM
 */

namespace BigBro\Http\Controllers\Objective;


use BigBro\Http\Controllers\Controller;
use BigBro\Models\User;
use BigBro\Providers\ObjectiveServiceProvider;
use Illuminate\Http\Request;
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


    public function getByEntity (Request $request) {
        $year = $request->get('year');
        $quarter = $request->get('quarter');
        $entityId = $request->get('entityId');

        $schedule = $this->scheduleService->getScheduleByEntity($entityId, $year, $quarter);

        $objectives = $this->objectiveService->getObjectives($schedule != null ? $schedule->id : null);

        return view('objective.objectiveList', [
            'objectives' => $objectives,
        ]);
    }
}