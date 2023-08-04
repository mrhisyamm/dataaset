<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class BarangLelang
 * @package App\Models
 * @version May 7, 2023, 7:42 am UTC
 *
 * @property string nama_barang
 * @property integer jumlah
 */
class BarangLelang extends Model
{

    public $table = 'barang_lelang';

    public $fillable = [
        'jumlah',
        'lelang_id',
        'barangs_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'jumlah' => 'required'
    ];

    
}
