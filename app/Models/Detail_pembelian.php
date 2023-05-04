<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class detail_pembelian
 * @package App\Models
 * @version December 9, 2019, 6:12 am UTC
 *
 * @property \App\Models\Barang barangs
 * @property \App\Models\Pembelian pembelians
 * @property integer qty
 * @property integer subtotal
 * @property integer pembelians_id
 * @property integer barangs_id
 * @property integer tanggal_beli
 * @property integer tanggal_expired
 * @property integer keterangan
 * @property integer harga_beli
 */
class detail_pembelian extends Model
{
    use SoftDeletes;

    public $table = 'detail_pembelians';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'qty',
        'subtotal',
        'pembelians_id',
        'barangs_id',
        'tanggal_beli',
        'keterangan',
        'harga_beli',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'qty' => 'integer',
        'subtotal' => 'integer',
        'pembelians_id' => 'integer',
        'barangs_id' => 'integer',
        'tanggal_beli' => 'date',
        'keterangan' => 'text',
        'harga_beli' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pembelians_id' => 'required',
        'barangs_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function barangs($id)
    {
        return \App\Models\Barang::where('id',$id)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pembelians()
    {
        return $this->belongsTo(\App\Models\Pembelian::class, 'pembelians_id');
    }
    public function barangss()
    {
        return $this->belongsTo(\App\Models\Barang::class, 'barangs_id','id');
    }
}
