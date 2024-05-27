<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table = 'tbl_enrollments';
    protected $primaryKey = 'enrollment_id ';
    public $timestamps = false;
    protected $fillable = ['student_id'];

    public function student(){
        return $this->hasOne(Student::class, 'student_id', 'student_id')->with('grades');
    }
}
