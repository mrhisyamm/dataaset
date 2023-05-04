<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail_Penghapusan extends Model
{
    use SoftDeletes;

    public $table = 'detail_penghapusan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'qty',
        'subtotal',
        'keterangan',
        'bukti',
        'penghapusan_id',
        'barangs_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'qty' => 'integer',
        'keterangan' => 'string',
        'bukti' => 'string',
        'subtotal' => 'integer',
        'penghapusan_id' => 'integer',
        'barangs_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penghapusan_id' => 'required',
        'barangs_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function barang($id)
    {
        return \App\Models\Barang::where('id',$id)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function penghapusan()
    {
        return $this->belongsTo(\App\Models\Penghapusan::class, 'penghapusan_id');
    }

}
