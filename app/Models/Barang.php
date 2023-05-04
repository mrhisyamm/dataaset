<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Barang
 * @package App\Models
 * @version February 20, 2020, 9:09 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailPembelians
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualans
 * @property string nama
 * @property integer stok
 * @property integer satuan
 * @property integer harga_beli
 * @property integer harga
 * @property string tgl_expired
 */
class Barang extends Model
{
    use SoftDeletes;

    public $table = 'barangs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'gambar',
        'stok',
        'umur_penyusutan',
        'harga'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'gambar' => 'string',
        'stok' => 'integer',
        'umur_penyusutan' => 'integer',
        'harga' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailPembelians()
    {
        return $this->hasMany(\App\Models\DetailPembelian::class, 'barangs_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailPenjualans()
    {
        return $this->hasMany(\App\Models\DetailPenjualan::class, 'barangs_id');
    }

    public function Detail_pembelian()
    {
        return $this->hasMany(\App\Models\Detail_pembelian::class, 'barangs_id');
    }
}
