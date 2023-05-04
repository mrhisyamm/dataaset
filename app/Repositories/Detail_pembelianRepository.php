<?php

namespace App\Repositories;

use App\Models\detail_pembelian;
use App\Repositories\BaseRepository;

/**
 * Class detail_pembelianRepository
 * @package App\Repositories
 * @version December 9, 2019, 6:12 am UTC
*/

class detail_pembelianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'qty',
        'subtotal',
        'pembelians_id',
        'barangs_id'
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
        return detail_pembelian::class;
    }
}
