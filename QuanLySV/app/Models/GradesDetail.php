<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradesDetail extends Model
{
    use HasFactory;
    protected $table = 'tbl_gradesdetail';
    protected $primaryKey = 'gradesDetail_id';
    public $timestamps = false;
    protected $fillable = ['grades_id', 'process_points', 'test_score', 'final_grades', 'attempt_number', 'class_section_id'];

    public function grades(){
        return $this->hasOne(Grades::class, 'grades_id', 'grades_id');
    }

}
