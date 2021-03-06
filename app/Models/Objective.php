<?php
/**
 * Created by PhpStorm.
 * User: yervand
 * Date: 9/27/15
 * Time: 1:34 AM
 */

namespace BigBro\Models;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'objective';

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
}