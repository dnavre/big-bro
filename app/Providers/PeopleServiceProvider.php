<?php
/**
 * Created by PhpStorm.
 * User: Sahak.Ordukhanyan
 * Date: 9/27/2015
 * Time: 3:22 AM
 */

namespace BigBro\Providers;


use BigBro\Models\User;
use Illuminate\Support\ServiceProvider;

class PeopleServiceProvider extends ServiceProvider
{


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('BigBro\Providers\PeopleServiceProvider', function ($app) {
            return new PeopleServiceProvider($app);
        });
    }

    public function listPeople() {
        return User::all();
    }

    public function getPerson ($id = null) {
        return User::firstOrNew([
            'id' => $id
        ]);
    }
}