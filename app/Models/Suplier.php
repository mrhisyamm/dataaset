<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Suplier
 * @package App\Models
 * @version December 9, 2019, 4:08 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection pembelians
 * @property string name
 * @property string alamat
 */
class Suplier extends Model
{
    use SoftDeletes;

    public $table = 'supliers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'alamat',
        'no_telp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'alamat' => 'string',
        'no_telp' => 'integer'
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
    public function pembelians()
    {
        return $this->hasMany(\App\Models\Pembelian::class, 'supliers_id');
    }
}
