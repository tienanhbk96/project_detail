<?php

namespace App\Modules\User\Modles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'm_user';
    protected $primaryKey = 'user_cd';
    protected $fillable = [
        'user_cd',
        'user_nm_j',
        'user_ab_j',
        'user_nm_e',
        'user_ab_e',
        'belong_div',
        'position_div',
        'auth_role_div',
        'incumbent_div',
        'pwd_upd_datetime',
        'login_datetime',
        'memo'
    ];
    public $timestamps = false;
}
