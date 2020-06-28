<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    //
    use softDeletes;
    protected $table = 'users';
    protected $fillable = [
        'student_number',
        'username',
        'password',
        'first_name',
        'last_name',
        'middle_name',
        'contact_number',
        'email',
        'roles_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}  
