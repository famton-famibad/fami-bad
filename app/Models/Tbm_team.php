<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbm_team extends Model
{
    use HasFactory;
    
    protected $table = 'tbm_teams';

    protected $fillable = [
        'team_name',
        'file_name', // fileidをfile_nameに変更
        'file_extension',
        'prefecture',
        'city',
        'practice_info',
        'delegate',
        'contact',
        'sns1',
        'sns2',
        'sns3',
        'optional',
        'del_flg'
    ];
}
