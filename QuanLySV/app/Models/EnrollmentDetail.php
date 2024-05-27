<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentDetail extends Model
{
    use HasFactory;
    protected $table = 'tbl_enrollmentDetail';
    protected $primaryKey = 'enrollmentDetail_id';
    public $timestamps = false;
    protected $fillable = ['enrollment_id', 'class_section_id', 'enrollmentDetail_date'];

    public function classSection(){
        return $this->hasOne(ClassSection::class, 'class_section_id', 'class_section_id')->with('semesterSubject', 'gradesdetail');
    }
    public function enrollment(){
        return $this->hasOne(Enrollment::class, 'enrollment_id', 'enrollment_id')->with('student');
    }

}
