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
        'team',
        'kaisai_date'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

}
