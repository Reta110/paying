<?php

namespace App\Repositories;

use App\Models\ActivityType;
use App\Repositories\BaseRepository;

/**
 * Class ActivityTypeRepository
 * @package App\Repositories
 * @version March 11, 2020, 3:34 am UTC
*/

class ActivityTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ActivityType::class;
    }
}
