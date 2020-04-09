<?php

namespace App\Repositories;

use App\Models\Work;
use App\Repositories\BaseRepository;

/**
 * Class WorkRepository
 * @package App\Repositories
 * @version March 11, 2020, 4:20 am UTC
*/

class WorkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'location_id',
        'activity_id',
        'date'
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
        return Work::class;
    }
}
