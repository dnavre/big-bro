<?php
/**
 * Created by PhpStorm.
 * User: Sahak.Ordukhanyan
 * Date: 9/27/2015
 * Time: 7:54 AM
 */

namespace BigBro\Providers;


use BigBro\Models\Schedule;
use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends  ServiceProvider
{


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('BigBro\Providers\ScheduleServiceProvider', function ($app) {
            return new ScheduleServiceProvider($app);
        });
    }

    public function getScheduleByEntity($entityId, $year, $quarter)
    {
        return Schedule::where([
            'entity_id' => $entityId,
            'year' => $year,
            'quarter' => $quarter
        ])->first();
    }
}