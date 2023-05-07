<?php

namespace App\Repositories;

use App\Models\BarangLelang;
use App\Repositories\BaseRepository;

/**
 * Class BarangLelangRepository
 * @package App\Repositories
 * @version May 7, 2023, 7:42 am UTC
*/

class BarangLelangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_barang',
        'jumlah'
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
        return BarangLelang::class;
    }
}
