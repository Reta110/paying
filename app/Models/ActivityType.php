<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ActivityType
 * @package App\Models
 * @version March 11, 2020, 3:34 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection activities
 * @property string name
 */
class ActivityType extends Model
{
    use SoftDeletes;

    public $table = 'activity_types';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function activities()
    {
        return $this->hasMany(\App\Models\Activity::class, 'activity_type_id');
    }
}
