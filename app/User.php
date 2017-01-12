<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'ft2_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mobile', 'nickname', 'avatar', 'password', 'role', 'remark', 'information_filled', 'sex', 'birthday',
        'smoke_history', 'real_name', 'hospital', 'department', 'diagnosis_time', 'pathologic_type',
        'disease_stage', 'metastatic_lesion', 'genic_mutation', 'test_method', 'disabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
