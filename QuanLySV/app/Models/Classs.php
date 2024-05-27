<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    use HasFactory;

    protected $table = 'tbl_class';
    protected $primaryKey = 'class_id';
    public $timestamps = false;
    protected $fillable = ['class_code', 'class_name', 'major_id', 'department_id', 'homeroom_teacher', 'course_id'];

    public function major()
    {
        return $this->hasOne(Major::class, 'major_id', 'major_id');
    }
    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'teacher_id', 'homeroom_teacher');
    }
    public function course()
    {
        return $this->hasOne(Course::class, 'course_id', 'course_id');
    }
}
