<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pembelian
 * @package App\Models
 * @version December 9, 2019, 4:06 am UTC
 *
 * @property \App\Models\Suplier supliers
 * @property \Illuminate\Database\Eloquent\Collection detailPembelians
 * @property string tempat
 * @property string tanggal
 * @property integer total
 * @property integer supliers_id
 */
class Pembelian extends Model
{
    use SoftDeletes;

    public $table = 'pembelians';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tempat',
        'tanggal',
        'total',
        'supliers_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tempat' => 'string',
        'tanggal' => 'date',
        'total' => 'integer',
        'supliers_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'supliers_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supliers()
    {
        return $this->hasOne(Suplier::class, 'id', 'supliers_id')
  ->withDefault(['name' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailpembelians()
    {
        return $this->hasMany(\App\Models\Detail_pembelian::class, 'pembelians_id');
    }

    public function barangs($id)
    {
        return \App\Models\Barang::where('id',$id)->first();
    }

    public function barang()
    {
        return $this->belongsTo(\App\Models\Barang::class, 'barangs_id');
    }

    public function users()
    {
        return $this->belongsTo(\App\Models\Barang::class, 'barangs_id');
    }
}
