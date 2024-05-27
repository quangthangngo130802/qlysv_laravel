<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'tbl_subject';
    protected $primaryKey = 'subject_id';
    public $timestamps = false;
    protected $fillable = ['subject_code', 'subject_name', 'subject_credit', 'major_id'];

    public function major(){
        return $this->hasOne(Major::class, 'major_id', 'major_id');
    }

    public function semester()
    {
        return $this->belongsToMany(Semester::class, 'tbl_semester_subject', 'subject_id', 'semester_id');
    }
}
