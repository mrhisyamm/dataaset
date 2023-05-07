<?php

namespace App\Repositories;

use App\Models\Lelang;
use App\Repositories\BaseRepository;

/**
 * Class LelangRepository
 * @package App\Repositories
 * @version May 7, 2023, 6:54 am UTC
*/

class LelangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_paket',
        'tgl_deadline'
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
        return Lelang::class;
    }
}
