<?php
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: yervand
 * Date: 9/27/15
 * Time: 1:34 AM
 */

namespace BigBro\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'team';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['creator_id', 'name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function creator()
    {
        return $this->belongsTo('BigBro\Models\User', 'creator_id');
    }

    public function teamMembers()
    {
        return $this->hasMany('BigBro\Models\TeamMember');
    }
}