<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lelang
 * @package App\Models
 * @version May 7, 2023, 6:54 am UTC
 *
 * @property string no_paket
 * @property string tgl_deadline
 */
class Lelang extends Model
{
    // use SoftDeletes;

    public $table = 'lelang';
    

    public $fillable = [
        'no_paket',
        'tgl_deadline',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'no_paket' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'no_paket' => 'required',
        'tgl_deadline' => 'required'
    ];

    
}
