<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon;

/**
 * Class Work
 * @package App\Models
 * @version March 11, 2020, 4:20 am UTC
 *
 * @property \App\Models\Activity activity
 * @property \App\Models\Location location
 * @property \App\Models\User user
 * @property integer user_id
 * @property integer location_id
 * @property integer activity_id
 * @property string|\Carbon\Carbon date
 */
class Work extends Model
{
    use SoftDeletes;

    public $table = 'works';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'location_id',
        'activity_id',
        'date',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'location_id' => 'integer',
        'activity_id' => 'integer',
        'date' => 'date:Y-m-d'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'location_id' => 'required',
        'activity_id' => 'required',
        'date' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function activity()
    {
        return $this->belongsTo(\App\Models\Activity::class, 'activity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class, 'location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }


    public function getDateAttribute($date)
    {
        return Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
