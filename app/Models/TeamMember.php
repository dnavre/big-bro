<?php
/**
 * Created by PhpStorm.
 * User: yervand
 * Date: 9/27/15
 * Time: 1:34 AM
 */

namespace BigBro\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'team_member';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function team()
    {
        return $this->belongsTo('BigBro\Models\Team', 'team_id');
    }

    public function user()
    {
        return $this->belongsTo('BigBro\Models\User', 'user_id');
    }

    public function creator()
    {
        return $this->belongsTo('BigBro\Models\User', 'creator_id');
    }
}