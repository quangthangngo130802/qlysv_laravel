<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'tbl_teacher';
    protected $primaryKey = 'teacher_id';
    public $timestamps = false;
    protected $fillable = ['teacher_code', 'teacher_name', 'teacher_email', 'teacher_phone', 'teacher_address', 'teacher_date_of_birth', 'teacher_gender', 'faculty_id', 'teacher_title', 'teacher_avatar'];

    public function faculty(){
        return $this->hasOne(Faculty::class, 'faculty_id', 'faculty_id');
    }
}
