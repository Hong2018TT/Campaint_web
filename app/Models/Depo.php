<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depo extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'depos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name_EN',
        'Name_KH',
        'Address_EN',
        'province_EN',
        'Address_KH',
        'province_KH',
        'Phone',
        'GPS',
    ];
}
