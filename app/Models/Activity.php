<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Activities
 * @package App\Models
 * @version March 11, 2020, 3:32 am UTC
 *
 * @property \App\Models\ActivityType activityType
 * @property string name
 * @property string amount
 * @property string percent
 * @property string total
 * @property integer activity_type_id
 */
class Activity extends Model
{
    use SoftDeletes;

    public $table = 'activities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'amount',
        'percent',
        'total',
        'activity_type_id',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'amount' => 'string',
        'percent' => 'string',
        'total' => 'string',
        'activity_type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'amount' => 'required',
        'percent' => 'required',
        'total' => 'required',
        'activity_type_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function activity_type()
    {
        return $this->belongsTo(\App\Models\ActivityType::class, 'activity_type_id');
    }
}
