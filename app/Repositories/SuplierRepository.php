<?php

namespace App\Repositories;

use App\Models\Suplier;
use App\Repositories\BaseRepository;

/**
 * Class SuplierRepository
 * @package App\Repositories
 * @version December 9, 2019, 4:08 am UTC
*/

class SuplierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'alamat',
        'no_telp'
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
        return Suplier::class;
    }
}
