<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbw_taikai extends Model
{
    use HasFactory;

    protected $table = 'tbw_taikais';

    protected $fillable = [
        'taikai_name',
        'prefecture',
        'city',
        'gym',
        'team',
        'contact',
        'kaisai_date',
        'file_name',
        'file_extension',
        'status',
        'others',
        'del_flg'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

}
