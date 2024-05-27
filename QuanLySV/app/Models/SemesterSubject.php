<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterSubject extends Model
{
    use HasFactory;

    protected $table = 'tbl_semester_subject';
    protected $primaryKey = 'semester_subject_id ';
    public $timestamps = false;
    protected $fillable = ['semester_id', 'subject_id'];

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'semester_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'subject_id')->with('major');
    }
}
