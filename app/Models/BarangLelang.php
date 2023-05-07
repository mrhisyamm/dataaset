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
        'nama_barang',
        'jumlah',
        'lelang_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_barang' => 'string',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_barang' => 'required',
        'jumlah' => 'required'
    ];

    
}
