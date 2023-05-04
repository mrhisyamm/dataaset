<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Penjualan
 * @package App\Models
 * @version December 9, 2019, 1:07 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualans
 * @property string tanggal
 * @property integer pembayaran
 * @property integer total
 */
class Penghapusan extends Model
{
    use SoftDeletes;

    public $table = 'penghapusan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tanggal',
        'pembayaran',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal' => 'date',
        'pembayaran' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
                'tanggal' => 'required',

        // 'total' => 'required',
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailPenghapusan()
    {
        return $this->hasMany(\App\Models\Detail_penghapusan::class, 'penghapusan_id');
    }

    public function detail_penghapusan(){
     return $this->hasMany(\App\Models\Detail_penghapusan::class,'penghapusan_id','id');
    }

}
