<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartEndDate extends Model
{
    use HasFactory;

    protected $table = 'tbl_start_end_date';
    protected $primaryKey = 'start_end_date_id';
    public $timestamps = false;
    protected $fillable = ['class_section_id', 'start_date', 'end_date'];

    public function schedule(){
        return $this->hasMany(Schedule::class, 'start_end_date_id', 'start_end_date_id')->with('classroom');
    }

    public function classSection(){
        return $this->hasOne(ClassSection::class, 'class_section_id', 'class_section_id')->with('semesterSubject');
    }
}
