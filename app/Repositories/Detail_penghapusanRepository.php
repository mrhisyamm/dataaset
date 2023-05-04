<?php

namespace App\Repositories;

use App\Models\Detail_Penghapusan;
use App\Repositories\BaseRepository;



class Detail_PenghapusanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'qty',
        'subtotal',
        'penghapusan_id',
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
        return Detail_Penghapusan::class;
    }
}
