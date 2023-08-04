<?php

namespace App\Repositories;

use App\Models\Penawaran;
use App\Repositories\BaseRepository;

/**
 * Class PenawaranRepository
 * @package App\Repositories
 * @version May 25, 2023, 7:07 am UTC
*/

class PenawaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'harga_penawaran',
        'is_selected'
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
        return Penawaran::class;
    }
}
