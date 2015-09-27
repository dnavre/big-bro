<?php

namespace BigBro\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use BigBro\Models\User;
use Ccovey\LdapAuth\LdapUser;
use DateTime;
use Illuminate\Database\Eloquent;

class AuthServiceProvider extends ServiceProvider
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
        $this->app->singleton('BigBro\Providers\AuthServiceProvider', function ($app) {
            return new AuthServiceProvider($app);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function createUserIfNeeded($ldUser)
    {
        $user = User::where('username', $ldUser->username)->first();

        if($user == null) {

            $user = new User();
            $user->username = $ldUser->username;
            $user->name = $ldUser->name;
            $user->email = $ldUser->email;
            $user->save();
        }
    }
}
