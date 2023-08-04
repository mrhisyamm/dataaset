<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Penawaran
 * @package App\Models
 * @version May 25, 2023, 7:07 am UTC
 *
 * @property integer harga_penawaran
 * @property boolean is_selected
 */
class Penawaran extends Model
{

    public $table = 'penawaran';
    

    public $fillable = [
        'harga_penawaran',
        'is_selected',
        'lelang_id',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'harga_penawaran' => 'integer',
        'is_selected' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'harga_penawaran' => 'required'
    ];

    
}
