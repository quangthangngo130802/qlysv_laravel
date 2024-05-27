<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;
    protected $table = 'tbl_grades';
    protected $primaryKey = 'grades_id';
    public $timestamps = false;
    protected $fillable = ['student_id', 'subject_id'];

    public function subject(){
        return $this->hasOne(Subject::class, 'subject_id', 'subject_id');
    }

    public function gradesDetail(){
        return $this->hasMany(GradesDetail::class, 'grades_id', 'grades_id');
    }
}
