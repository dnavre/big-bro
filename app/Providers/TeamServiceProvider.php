<?php

namespace BigBro\Providers;

use BigBro\Models\Entity;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use BigBro\Models\Team;
use Ccovey\LdapAuth\LdapUser;
use DateTime;
use Auth;

class TeamServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'BigBro\Model' => 'BigBro\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }

    public function register()
    {
        $this->app->singleton('BigBro\Providers\TeamServiceProvider', function ($app) {
            return new TeamServiceProvider($app);
        });
    }


    public function getAll()
    {
        return Team::all();
    }

    public function createTeam($name) {

        $team = new Team();

        $team->name = $name;
        $team->creator_id = Auth::user()->id;

        $team->save();

        $entity = new Entity();
        $entity->team_id = $team->id;
        $entity->save();
    }

    public function deleteTeam($teamId) {

        $t = Team::where('id', $teamId)->first();

        $t->delete();
    }

    public function get($teamId)
    {
        return Team::where('id', $teamId)->first();
    }
}
