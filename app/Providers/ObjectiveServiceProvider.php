<?php
/**
 * Created by PhpStorm.
 * User: Sahak.Ordukhanyan
 * Date: 9/27/2015
 * Time: 12:17 PM
 */

namespace BigBro\Providers;


use BigBro\Http\Requests\Request;
use BigBro\Models\Objective;
use Illuminate\Support\ServiceProvider;

class ObjectiveServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('BigBro\Providers\ObjectiveServiceProvider', function ($app) {
            return new ObjectiveServiceProvider($app);
        });
    }

    /**
     * @param $scheduleId
     * @return Objective | null
     */
    public function getObjectives ($scheduleId) {
        return Objective::where([
            'schedule_id' => $scheduleId
        ])->get();
    }

    public function createObjective($scheduleId, $objectiveTitle) {
        $objective = new Objective();
        $objective->title = $objectiveTitle;
        $objective->schedule_id = $scheduleId;

        $objective->save();
    }
}