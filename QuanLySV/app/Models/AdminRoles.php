<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRoles extends Model
{
    use HasFactory;
    protected $table = 'tbl_admin_roles';
    protected $primaryKey = 'admin_role_id';
    public $timestamps = false;
    //protected $fillable = ['class_name', 'major_id', 'department_id', 'homeroom_teacher', 'year_of_admission'];
}
