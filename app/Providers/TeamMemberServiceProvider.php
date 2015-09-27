<?php

namespace BigBro\Providers;

use BigBro\Models\TeamMember;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use BigBro\Models\Team;
use Ccovey\LdapAuth\LdapUser;
use DateTime;
use Auth;

class TeamMemberServiceProvider extends ServiceProvider
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
        $this->app->singleton('BigBro\Providers\TeamMemberServiceProvider', function ($app) {
            return new TeamMemberServiceProvider($app);
        });
    }


    public function getAll()
    {
        return Team::all();
    }

    public function addTeamMember($teamId, $userId) {

        $tm = new TeamMember();

        $tm->user_id = $userId;
        $tm->team_id = $teamId;
        $tm->creator_id = Auth::user()->id;

        $tm->save();
    }
}
