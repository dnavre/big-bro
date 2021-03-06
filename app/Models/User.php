<?php

namespace BigBro\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    public $primaryKey  = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email','remember_token'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    public function entity()
    {
        return $this->hasOne('BigBro\Models\Entity', 'user_id');
    }

    public function createdTeams()
    {
        return $this->hasMany('BigBro\Models\Teams');
    }

    public function createdTeamMembers() {
        return $this->hasMany('BigBro\Models\TeamMember', 'creator_id');
    }

    public function teamMemberships() {
        return $this->hasMany('BigBro\Models\Teams', 'user_id');
    }
}
