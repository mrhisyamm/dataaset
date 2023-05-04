<?php

namespace App\Repositories;

use App\Models\Pembelian;
use App\Repositories\BaseRepository;

/**
 * Class PembelianRepository
 * @package App\Repositories
 * @version December 9, 2019, 4:06 am UTC
*/

class PembelianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tempat',
        'tanggal',
        'total',
        'supliers_id'
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
        return Pembelian::class;
    }
}
