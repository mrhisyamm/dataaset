<?php

namespace App\Repositories;

use App\Models\Barang;
use App\Repositories\BaseRepository;

/**
 * Class BarangRepository
 * @package App\Repositories
 * @version February 20, 2020, 9:09 am UTC
*/

class BarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'gambar',
        'stok',
        'satuan',
        'harga_beli',
        'harga',
        'tgl_expired'
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
        return Barang::class;
    }
}
