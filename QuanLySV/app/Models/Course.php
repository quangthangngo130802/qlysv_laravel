<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'tbl_course';
    protected $primaryKey = 'course_id';
    public $timestamps = false;
    protected $fillable = ['course_name', 'year_of_admission'];

}
